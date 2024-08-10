<?php
class VoucherController extends BaseController{ 

    public $route;
    public $voucherModel;
    
    public function loadModels()
    {
        $this -> route = new Route();
        $this-> voucherModel = new Voucher();

    }
    public function list(){
        $voucher = $this->voucherModel->allTable();
        $this->viewApp->requestView('voucher.voucherList',['voucher' => $voucher]);
    }
    
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $code = $_POST['voucher_name'];
            $value = $_POST['voucher_sale'];
          $data = array(
                'voucher_code' => $code,
                'status' => 0,
                'sale' => $value,
            );
          if ( $this->voucherModel->insertTable($data) ){
            $this->route->redirectAdmin('voucher');
          }
        }
    } 
    public function edit(){
        $id = $_GET['id'];
        $status = $_GET['status'];
        $data = array(
            'status' => $status,
        );
       $this->voucherModel->updateIdTable($data,$id);
        $this->route->redirectAdmin('voucher');
    }

}