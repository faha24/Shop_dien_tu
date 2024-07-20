<?php 


class DetailController extends BaseController
{
    public $detailModel;
    public $categoryModel;

    public $route;

    public function loadModels() {
        $this -> detailModel = new details();
      
        $this -> route = new Route();
    }

    public function Index() {
        $id = $_GET['id'];
     
        $Details = $this->detailModel->FindAllTable($id);
        $color = $this->detailModel->getColor();
        $size = $this->detailModel->getSize();
       
     
        $this->viewApp->requestView('product.detail',['Details' => $Details ,'id' => $id ,'color' => $color ,'size' => $size]);
    }
    public function create(){
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            // $size_id = $_POST['size_id'];
            $color_id = $_POST['color_id'];
         
            $data = array(
                'product_id'=> $id,
                'quantity' => $quantity,
                'price' => $price,
                // 'size_id' => $size_id,
                'color_id' => $color_id,
               
            );
      $this -> detailModel ->insertTable($data);
      $this->route->redirectAdmin('Detail_pr',['id' => $id]);


    }
 
   
    }
    public function delete(){
        $id = $_GET['id'];
        $pr_id = $_GET['pr_id'];
        $this->detailModel->removeIdTable($id);
        $this->route->redirectAdmin('Detail_pr',['id' => $pr_id]);
    }
}