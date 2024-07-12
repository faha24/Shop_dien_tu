<?php
// index phục vụ request của admin

// kiểm tra act và điều hướng tới các controller phù hợp
match ($route->getAct()) {
    '/' => (new DashboardController())->dashboard(),
    'product' => (new ProductController())->List(),
   'add_pr' => (new ProductController())->addproducts(),
   'delete_pr' => (new ProductController())->deleteProduct(),
'edit_pr' => (new ProductController())->editproducts(),
<<<<<<< HEAD

=======
'getdata' => (new ProductController())->getdata(),
>>>>>>> 420a674301ecef7cfb84ce9a06116e5530025486
};