<?php


class OderController extends BaseController
{
    public $oderModel;
   
    public $route;

    public function loadModels() {
        $this -> oderModel = new Order();
      
        $this -> route = new Route();
    }

    public function Index() {
       
        $oder = $this->oderModel->allTable();
        $item = $this ->oderModel->getitem();
        $data =  array(
            'order' => $oder,
            'item' => $item
        );
        $this->viewApp->requestView('order.list',$data);
    }
    public function getdataOder()
    {
      $oder = $this->oderModel->allTable();
      $item = $this ->oderModel->getitem();
      $data =  array(
          'order' => $oder,
          'item' => $item
      );
      header('Content-Type: application/json');
  
      echo json_encode($data);
    }
   
    
}