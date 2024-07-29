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
        $this->viewApp->requestView('index');
    }
    public function cart()
    {
        $this->viewApp->requestView('home.cart');
    }
    public function detail()
    {
        $id = $_GET['id'];
        $product = $this->homeModel->findIdTable($id);
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
                // var_dump($data_oder);
                // die();
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


            );
            $id = $this->oderModel->insertTable($data_oder);

            $item =  $_POST['item'][0];
            $item_arr = json_decode($item, true);
            foreach ($item_arr as $item) {
                // Kiểm tra nếu phần tử là mảng
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
                $this->oderModel->insertTable_item($data_item);
            }

            $_SESSION['alert'] = 'dat hang thanh cong';
            $this->router->redirectClient('cart');
        }
    }
}
