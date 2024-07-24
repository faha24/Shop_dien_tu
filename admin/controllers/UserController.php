<?php
class UserController extends BaseController{
    public $route;
    public $userModel;
    public function loadModels()
    {
        $this -> route = new Route();
        $this-> userModel = new Users();
    }
  
    public function list(){
    $user =    $this->userModel->allTable();
        $this->viewApp->requestView('user.list',['user' => $user]);

    }
}
