<?php
// index phục vụ request của admin

// kiểm tra act và điều hướng tới các controller phù hợp
match ($route->getAct()) {
    '/' => (new DashboardController())->dashboard(),
    'product' => (new ProductController())->List(),
   'add_pr' => (new ProductController())->addproducts(),
   'delete_pr' => (new ProductController())->deleteProduct(),
'edit_pr' => (new ProductController())->editproducts(),
'getdata' => (new ProductController())->getdata(),
'Detail_pr' => (new DetailController())->Index(),
'add_pr_dt' => (new DetailController())->create(),
'delete_pr_dt' => (new DetailController())->delete(),
};