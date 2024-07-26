<?php


class ProductController extends BaseController
{
    public $productModel;
    public $categoryModel;
    public $imageModel;
    public $route;

    public function loadModels()
    {
        $this->productModel = new product();
        $this->categoryModel = new Category();
        $this->imageModel = new img();
        $this->route = new Route();
    }

    public function List()
    {
        $product = $this->productModel->allTable();
        $cate = $this->categoryModel->allTable();
        $this->viewApp->requestView('product.list', ['product' => $product, 'categories' => $cate]);
    }
    public function addproducts()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_name = $_POST['product_name'];
            $price = $_POST['product_price'];
            $product_des = $_POST['product_des'];
            $stock = $_POST['product_quantity'];
            $category_id = $_POST['category_id'];
            $details = $_POST['Details'];
            $data = array(
                'product_name' => $product_name,
                'price' => $price,
                'product_des' => $product_des,
                'stock' => $stock,
                'category_id' => $category_id,
                'view' => 0,
                'status' => 1,
                'Detail_status' => $details,
            );

            $id = $this->productModel->insertTable($data);
            $dataImg = array(
                'path' => $_FILES['img']['name'],
                'product_id' => $id,
                'role' => 1,
            );

            $dir = './lib/img/products/';
            move_uploaded_file($_FILES['img']['tmp_name'], $dir . $_FILES['img']['name']);
            $this->imageModel->insertTable($dataImg);

            $name = array();

            foreach ($_FILES['images']['name'] as $file) {
                $name[] = $file;
            }
            foreach ($_FILES['images']['tmp_name'] as $file) {
                $tmp_name[] = $file;
            }
            foreach ($name as $file => $key) {

                move_uploaded_file($tmp_name[$file], $dir . $key);
                $dataImgs = array(
                    'path' => $key,
                    'product_id' => $id,
                    'role' => 0,
                );
                $this->imageModel->insertTable($dataImgs);
            }


            $this->route->redirectAdmin('product');
        }
    }
    public function editproducts()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $product_name = $_POST['product_name'];
            $price = $_POST['product_price'];
            $product_des = $_POST['product_des'];
            $stock = $_POST['product_quantity'];
            $category_id = $_POST['category_id'];
            // $details = $_POST['Details'];
            $data = array(
                'product_name' => $product_name,
                'price' => $price,
                'product_des' => $product_des,
                'stock' => $stock,
                'category_id' => $category_id,
                'view' => 0,
                'status' => 1,
                // 'Detail_status' => $details,
            );
            $dir = './lib/img/products/';
            $this->productModel->updateIdTable($data, $id);




            if (isset($_FILES['img'])) {
                move_uploaded_file($_FILES['img']['tmp_name'], $dir . $_FILES['img']['name']);
                $img_old =  $this->imageModel->findroleTable($id, 1);
                if (isset($img_old)) {
                    $data_old_img = array(
                        'path' => $_FILES['img']['name'],
                    );
                    $this->imageModel->updateIdTable($data_old_img, $img_old['id']);
                 
                }else {
                    $dataImg = array(
                        'path' => $_FILES['img']['name'],
                        'product_id' => $id,
                        'role' => 1,
                    );
        
                    move_uploaded_file($_FILES['img']['tmp_name'], $dir . $_FILES['img']['name']);
                    $this->imageModel->insertTable($dataImg);
                }

                $dataImg = array(
                    'path' => $_FILES['img']['name'],
                    'product_id' => $id,
                    'role' => 1,
                );
            
               
            }
            if(isset($_FILES['images'])){
                $name = array();

                foreach ($_FILES['images']['name'] as $file) {
                    $name[] = $file;
                }
                foreach ($_FILES['images']['tmp_name'] as $file) {
                    $tmp_name[] = $file;
                }
                foreach ($name as $file => $key) {
    
                    move_uploaded_file($tmp_name[$file], $dir . $key);
                    $dataImgs = array(
                        'path' => $key,
                        'product_id' => $id,
                        'role' => 0,
                    );
                    $this->imageModel->insertTable($dataImgs);
                }
            }



            $this->productModel->updateIdTable($data, $id);
        }
        $this->route->redirectAdmin('product');
    }
    public function deleteProduct()
    {
        $id = $_GET['id'];
        $this->productModel->updateIdTable(['status' => '2'],$id);
        $this->route->redirectAdmin('product');
    }
    public function ListTrash(){
        $cate = $this->productModel->allTable();
        $this->viewApp->requestView('product.trash', ['product' => $cate]);
      }
      
    public function getdata()
    {
        $product = $this->productModel->allTable();
        $arr =  array($product);
        header('Content-Type: application/json');

        echo json_encode($product);
    }
    public function editStatus(){
        $id = $_GET['id'];
        $data = array(
       
          'status' => 1,
         
        );
        $this->productModel->updateIdTable($data, $id);
        $this->route->redirectAdmin('trash_pr');
      }
}
