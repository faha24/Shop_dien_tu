<?php

class UserController extends BaseController
{
    public $homeModel;
    public $oderModel;
    public $router;
    public $userModel;
    public function loadModels()
    {
        $this->userModel = new Users();
        $this->homeModel = new home();
        $this->router = new Route();
        $this->oderModel = new oder();
    }

    public function login()
    {
        $this->viewApp->requestView('user.login');
    }
    public function authen()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $pass = md5($_POST['pass']);
            if ($this->userModel->findIdUser($name,$pass)) {
                $_SESSION['username'] = $name;
              
            }

            if (isset($_SESSION['username'])) {
                $this->route->redirectClient('');
            }else{
                $this->route->redirectClient('login');
            }
        }
    }

    public function reiget()
    {
        $this->viewApp->requestView('user.reiget');
    }
    public function new_reiget()
      {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $pass = md5($_POST['password']);
            $arr = array(
                    'username' => $name,
                    'password' => $pass,
                    'role' => 1,
            );

             if($this->userModel->insertTable($arr)){
                $this->viewApp->requestView('user.login');
             }else{

                $this->viewApp->requestView('user.reiget');

             }


        }
    }
    public function logout(){
            unset($_SESSION['username']);
            $this->viewApp->requestView('user.login');
    }
    public function manager(){
        $this->viewApp->requestView('user.usermanager');
    }
    public function address(){
        $this->viewApp->requestView('user.createaddress');
    }
    public function list_address(){
        $this->viewApp->requestView('user.listaddress');
    }
    public function oder(){
        $this->viewApp->requestView('user.oder');
    }
}