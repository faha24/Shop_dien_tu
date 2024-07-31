<?php

class HomeController extends BaseController
{
    public $homeModel;
    public $oderModel;
    public $router;
    public function loadModels()
    {
        $this->homeModel = new home();
        $this->router = new Route();
        $this->oderModel = new oder();
    }

    public function index()
    {
        $products=  $this ->homeModel -> allproducts();
        $top = $products;
      usort($top, function($a, $b) {
            return $b['product_view'] <=> $a['product_view'];
        });
   
        $this->viewApp->requestView('index',['products'=>$products ,'top'=>$top]);
    }
    public function cart()
    {
        if(isset($_GET['vnp_ResponseCode'])  && $_GET['vnp_ResponseCode'] == 00){
            $id = $_GET['id'];
            $data = array(
                'payment' => 1,
            );
            $this -> oderModel -> updateIdTable($data,$id);
            $_SESSION['alert'] = ' thanh toán thành công';

        }else{
            if(isset( $_SESSION['alert']) && isset($_GET['id'])){
        $_SESSION['alert'] = 'thanh toán thất bại';
        $id = $_GET['id'];
        $this -> oderModel -> removeIdTable($id);
        }
       

        }
        $this->viewApp->requestView('home.cart');
    }
    public function search(){
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $seach = $_POST['search'];
                $cate = $_POST['select'];
                // var_dump($seach,$cate);
               $search = $this->homeModel->findSeach($seach,$cate);
               $seling = $search;
               usort($seling, function($a, $b) {
                return $b['product_view'] <=> $a['product_view'];
            });
       }
       $this->viewApp->requestView('home.search',['search'=>$search,'seling' => $seling]);

    }
    public function detail()
    {
        $id = $_GET['id'];
        $product = $this->homeModel->findIdTable($id);
        $update = array(
            'View' => $product['View'] + 1 ,
        );
      

        $this->homeModel->updateIdTable($update,$id);
        $imgs = $this->homeModel->allimages($id);
        $variant = $this->homeModel->allvariant($id);
        $color = $this->homeModel->allcolor();
        $data = array(
            'product' => $product,
            'imgs' => $imgs,
            'variant' => $variant,
            'color' => $color,
        );


        $this->viewApp->requestView('home.detail', $data);
    }
    public function add_to_cart()
    {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['color'])) {
                $product_name = $_POST['pr_name'] . ' ' . $_POST['color'];
            } else {
                $product_name = $_POST['pr_name'];
            }

            // var_dump($_POST['color']);
            // die();
            $price = $_POST['pr_price'];
            $img = $_POST['img'];
            $qty = $_POST['pr_qty'];
            $pr_id = $_POST['pr_id'];
            $data = array(
                'pr_id' => $pr_id,
                'product_name' => $product_name,
                'price' => $price,
                'img' => $img,
                'qty' => $qty,
                'total'=>$qty*$price,

            );
            // var_dump($data);
            // die();
            $found = false;
            foreach ($_SESSION['cart'] as &$cart_item) {
                if ($cart_item['product_name'] == $product_name) {
                    // Product already exists, update the quantity
                    $cart_item['qty'] += $qty;
                    $found = true;
                    break;
                }
            }

            // If the product doesn't exist in the cart, add it
            if (!$found) {
                $_SESSION['cart'][] = $data;
            }
            $_SESSION['alert'] = 'thêm vào giỏ hàng thành công';
            // var_dump($id);
            // die();
            $this->router->redirectClient('detail', ['id' => $id]);
        }
    }
    public function delete_cart()
    {
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
        $this->router->redirectClient('cart');
    }
    public function check_out()
    {
     

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['selected_items'])) {
                $selected_items = $_POST['selected_items'];
                $quantities = $_POST['qty'];

                // Kiểm tra cấu trúc của mảng $selected_items


                // Xử lý các sản phẩm được chọn
                foreach ($selected_items as $key) {
                    $product = $_SESSION['cart'][$key];
                    $quantity = $quantities[$key];

                    $data_oder[] = array(
                       
                        'pr_id' => $product['pr_id'],
                        'product_name' => $product['product_name'],
                        'qty' => $quantity,
                        'price' => $product['price'],
                        'subtotal' => $product['price'] * $quantity,
                    );
                }
               
                $this->viewApp->requestView('home.checkout', $data_oder);
            } else {
                $this->router->redirectClient('cart');
            }

            // Redirect hoặc hiển thị thông báo sau khi xử lý
            // header('Location: order_success.php');
            // exit();

        }
    }
    public function add_to_oder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $std = $_POST['tel'];
            $amount = $_POST['amount'];
            
            if(isset($_POST['user_id'])) {
                $user_id = $_POST['user_id'];
            }else {
                $user_id = null;
            }
           
            $data_oder = array(
                'user_id' => $user_id,
                'name' => $name,
                'address' => $address,
                'std' => $std,
                'status' => 0,
                'oderDate' => date('Y-m-d'),
                'total_amount' => $amount,
                'oder_code' => rand() . date('d'),
                'payment' => 0,
                


            );
            $id = $this->oderModel->insertTable($data_oder);

            $item =  $_POST['item'][0];
            $item_arr = json_decode($item, true);
            
            foreach ($item_arr as $item) {
                // Kiểm tra nếu phần tử là mảng
                // var_dump($item['']);

                $product_names = $item['product_name'];
                $quantities = $item['qty'];
                $prices = $item['price'];
                $subtotals = $item['subtotal'];
                $pr_id = $item['pr_id'];
                $data_item = array(
                    'oder_id' => $id,
                    'product_name' => $product_names,
                    'quantity' => $quantities,
                    'price' => $prices,
                    'subtotals' => $subtotals,
                    'product_id' => $pr_id,
                );
                if(isset($_SESSION['cart'] )){
                    foreach($_SESSION['cart'] as $key => $cart){
                        if($cart['product_name'] == $product_names){
                            unset($_SESSION['cart'][$key]);
                        }
                    }
                }
                $this->oderModel->insertTable_item($data_item);
            }

            $_SESSION['alert'] = 'dat hang thanh cong';
            $this->router->redirectClient('cart');
         
            if(isset($_POST['payment'])){

                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost/Shop_dien_tu/index.php?act=cart&id=".$id;
                $vnp_TmnCode = "3S63W6MR";//Mã website tại VNPAY 
                $vnp_HashSecret = "1VP6KLP1H2MOZKMNZZWHIR7HDMX6KEBC"; //Chuỗi bí mật
                // var_dump($vnp_HashSecret);
                // die();
                
                $vnp_TxnRef = $id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
                // sang VNPAY
                $vnp_OrderInfo = 'thanh toán đơn hàng test';
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $subtotals * 100;
                $vnp_Locale = 'vn';
                $vnp_BankCode = '';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                //Add Params of 2.0.1 Version
                // $vnp_ExpireDate = $_POST['txtexpire'];
                //Billing
                // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                // $vnp_Bill_Email = $_POST['txt_billing_email'];
                // $fullName = trim($_POST['txt_billing_fullname']);
                // if (isset($fullName) && trim($fullName) != '') {
                //     $name = explode(' ', $fullName);
                //     $vnp_Bill_FirstName = array_shift($name);
                //     $vnp_Bill_LastName = array_pop($name);
                // }
                // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
                // $vnp_Bill_City=$_POST['txt_bill_city'];
                // $vnp_Bill_Country=$_POST['txt_bill_country'];
                // $vnp_Bill_State=$_POST['txt_bill_state'];
                // // Invoice
                // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
                // $vnp_Inv_Email=$_POST['txt_inv_email'];
                // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
                // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
                // $vnp_Inv_Company=$_POST['txt_inv_company'];
                // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
                // $vnp_Inv_Type=$_POST['cbo_inv_type'];
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,
                    // "vnp_ExpireDate"=>$vnp_ExpireDate,
                    // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
                    // "vnp_Bill_Email"=>$vnp_Bill_Email,
                    // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
                    // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
                    // "vnp_Bill_Address"=>$vnp_Bill_Address,
                    // "vnp_Bill_City"=>$vnp_Bill_City,
                    // "vnp_Bill_Country"=>$vnp_Bill_Country,
                    // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
                    // "vnp_Inv_Email"=>$vnp_Inv_Email,
                    // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
                    // "vnp_Inv_Address"=>$vnp_Inv_Address,
                    // "vnp_Inv_Company"=>$vnp_Inv_Company,
                    // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
                    // "vnp_Inv_Type"=>$vnp_Inv_Type
                );
                
                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                }
                
                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }
                
                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('SHA512', $hashdata, $vnp_HashSecret);//  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array('code' => '00'
                    , 'message' => 'success'
                    , 'data' => $vnp_Url);
                    if (isset($_POST['redirect'])) {
                        
                        header('Location: ' . $vnp_Url);
                       die();
                    } else {
                        echo json_encode($returnData);
                    }
               }
             
            }
           
       
        }
    }

