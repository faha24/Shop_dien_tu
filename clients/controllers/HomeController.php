<?php 

class HomeController extends BaseController
{
    public $homeModel;
    public function loadModels() {
        $this -> homeModel = new home(); 
    }

    public function index() {
        $this->viewApp->requestView('index');
    }
    public function cart() {
        $this->viewApp->requestView('home.cart');
    }
    public function detail() {
        $id = $_GET['id'];
        $product = $this -> homeModel -> findIdTable($id);
        $imgs = $this -> homeModel -> allimages($id);
    
        $data = array(
            'product' => $product,
            'imgs' => $imgs,
           
        );
        $this->viewApp->requestView('home.detail', $data);
    }


}

