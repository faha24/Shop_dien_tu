<?php

class UserController extends BaseController
{
    public $homeModel;
    public $oderModel;
    public $router;
    public $userModel;

    public $adressModel ; 
    public function loadModels()
    {
        $this->userModel = new Users();
        $this->homeModel = new home();
        $this->adressModel = new address();
        $this->router = new Route();
        $this->oderModel = new oder(); 
    //    $this->adressModel = new adress();  // add model for adress
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
            $user = $this->userModel->findIdUser($name,$pass);
           
           
            if ($user != null) {
                if($user['role'] == 2){
                    $this->route->redirectClient('login');
                    exit();
                }
                $_SESSION['username'] = $name;
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_id'] = $user['id'];
                if($_SESSION['user_role'] == 0){
                    $this->route->redirectAdmin('');
                    exit();
                }else{
                    $this->route->redirectClient('');
                }
            }else{
                $this->route->redirectClient('login');
            }
            
            // if($_SESSION['user_role'] == 0){
            //     $this->route->redirectAdmin('');
            //     exit();
            // }
          
          
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
            unset($_SESSION['user_role']);
            unset($_SESSION['user_id']);
            $this->viewApp->requestView('user.login');
    }
    public function manager(){
        $this->viewApp->requestView('user.usermanager');
    }
    public function address(){
        $this->viewApp->requestView('user.createaddress');
      
    }
    public function list_address(){
       $adress = $this->adressModel->allTable();

        $this->viewApp->requestView('user.listaddress',['address' => $adress]);
    }
    public function oder(){
       $id = $this -> router -> getId();
       $data = $this -> oderModel -> findIdUserOrder($id);
   
        $this->viewApp->requestView('user.oder',$data);
    }
    public function add_adress()
    {
     
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $name = $_POST['name'];
            $address = $_POST['address'];
            $std = $_POST['tel'];
            $user_id = $_SESSION['user_id'];
        
            $data = array(
             
               
                'adress_name' => $address,
                'std' => $std,
                'user_id' => $user_id,
                'name' => $name,
                'role'=> 1,
            );

            if($this->adressModel->insertTable($data)){
            $this->router->redirectClient('address');        
        }

        }
    }
    public function del_dres() {
            $id = $_GET['id'];
            $this->adressModel->removeIdTable($id);
            $this->router->redirectClient('address');
    }
}