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
    $user = $this->userModel->allTable();
        $this->viewApp->requestView('user.list',['user' => $user]);

    }
    public function ban(){
        $id = $_GET['id'];
        $this -> userModel->updateIdTable(['role' => 2 ],$id);
        $this -> route -> redirectAdmin('user');
    }
    public function unban(){
        $id = $_GET['id'];
        $this -> userModel->updateIdTable(['role' => 1 ],$id);
        $this -> route -> redirectAdmin('user');
    }
}
