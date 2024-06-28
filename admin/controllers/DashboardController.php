<?php 


class DashboardController extends BaseController
{
    public $productModel;
    public $categoryModel;

    public function loadModels() {
        $this -> productModel = new Dashboard();
        $this -> categoryModel = new Category();
    }

    public function dashboard() {
     
       $product =$this->productModel-> allTable();
       $cate = $this->categoryModel-> allTable();


        $this->viewApp->requestView('dashboard', ['product' => $product, 'categories' => $cate ] );
    }
    public function addproducts() {
     

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           $product_name = $_POST['product_name'];
           $product_price = $_POST['product_price'];
           $product_des = $_POST['product_des'];
           $product_quantity = $_POST['product_quantity'];
           $category_id = $_POST['category_id'];
           $data = array(
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_des' => $product_des,
            'product_quantity' => $product_quantity,
            'category_id' => $category_id,
            'product_view' => 0,
        );
           $this -> productModel -> insertTable($data);
        header('location:index.php?mode=admin');

        }
    }
    public function deleteProduct(){
        $id = $_GET['id'];
      $this -> productModel->  removeIdTable($id);
      header('location:index.php?mode=admin');
        
    }
}