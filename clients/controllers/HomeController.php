<?php 

class HomeController extends BaseController
{
    public function loadModels() {}

    public function index() {
        $this->viewApp->requestView('index');
    }
    public function cart() {
        $this->viewApp->requestView('home.cart');
    }


}

