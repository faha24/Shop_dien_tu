<?php
// index phục vụ request của người dùng

// kiểm tra act và điều hướng tới các controller phù hợp
match ($route->getAct()) {
    '/' => (new HomeController())->index(),
    'cart' => (new HomeController())->cart(),
    'detail' => (new HomeController())->detail(),
    'add_to_cart' => (new HomeController())->add_to_cart(),
    'delete_cart' => (new HomeController())->delete_cart(),
    'check_out' => (new HomeController())->check_out(),
    'add_oder' => (new HomeController())->add_to_oder(),
  
    'login'=> (new UserController())->login(),
'authen'=>(new UserController())->authen(),
'reiget' =>(new UserController())->reiget(),
'add_new_user'=>(new UserController())->new_reiget(),
'logout' => (new UserController())->logout()
};