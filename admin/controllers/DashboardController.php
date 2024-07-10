<?php 


class DashboardController extends BaseController
{
    public $productModel;
    public $categoryModel;

    public $route;

    public function loadModels() {
        $this -> productModel = new Dashboard();
        $this -> categoryModel = new Category();
        $this -> route = new Route();
    }

    public function dashboard() {
       $product =$this->productModel-> allTable();
       $cate = $this->categoryModel-> allTable();
        $this->viewApp->requestView('dashboard', ['product' => $product, 'categories' => $cate ] );
    }
   
}