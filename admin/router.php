<?php
// index phục vụ request của admin

// kiểm tra act và điều hướng tới các controller phù hợp
match ($route->getAct()) {
    '/' => (new DashboardController())->dashboard(),
   'add_pr' => (new DashboardController())->addproducts(),
   'delete_pr' => (new DashboardController())->deleteProduct(),

};