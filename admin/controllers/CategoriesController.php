<?php
class CategoriesController extends BaseController
{
  public $route;

  public $categoryModel;
  public function loadModels()
  {
    $this->categoryModel = new Category();
    
    $this->route = new Route();
  }
  public function List()
  {
    $cate = $this->categoryModel->getitem();
    $this->viewApp->requestView('category.list', ['categories' => $cate]);
  }
public function ListTrash(){
  $cate = $this->categoryModel->allTable();
  $this->viewApp->requestView('category.trash', ['categories' => $cate]);
}
  public function deleteCate()
  {
    $id = $_GET['id'];
   
    $this->categoryModel->removeIdTable($id);


    $this->route->redirectAdmin('category');
  }
  public function editCates()
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $cate_name = $_POST['product_name'];

      $cate_des = $_POST['product_des'];
     
      // $details = $_POST['Details'];
      $data = array(
        'category_name' => $cate_name,

        'category_des' => $cate_des,
        'status' => 1,
       
      );

      $this->categoryModel->updateIdTable($data, $id);
    }
    $this->route->redirectAdmin('category');
  }

  public function editStatus(){
    $id = $_GET['id'];
    $data = array(
   
      'status' => 1,
     
    );
    $this->categoryModel->updateIdTable($data, $id);
    $this->route->redirectAdmin('trashCate');
  }
  public function addCate()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $product_name = $_POST['product_name'];
 
      $product_des = $_POST['product_des'];
  
     
      
      $data = array(
        'category_name' => $product_name,
        'category_des' => $product_des,
        'status' => 1,
      );

      $this->categoryModel->insertTable($data);

      $this->route->redirectAdmin('category');
    }
  }
  public function getdataCate()
  {
    $cate = $this->categoryModel->allTable();
    $arr =  array($cate);
    header('Content-Type: application/json');

    echo json_encode($cate);
  }
}
