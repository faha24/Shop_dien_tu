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
        
            $color_id = $_POST['color_id'];
         
            $data = array(
                'product_id'=> $id,
                'quantity' => $quantity,
                'price' => $price,
                
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
    public function get_data(){
        $id= $_GET['id'];
        $vr = $this->detailModel->FindAllTable($id);
        // $arr =  array($cate);
        header('Content-Type: application/json');
    
        echo json_encode($vr);
    }
    public function edit(){
      $id_pr = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_detail = $_POST['id_detail'];
           
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
          
       
            $data = array(
                'quantity' => $quantity,
                'price' => $price,
                
               
            );
      $this -> detailModel -> updateIdTable($data, $id_detail);
        $this -> route -> redirectAdmin('Detail_pr',['id'=> $id_pr] );
     
 
    }
    }
}