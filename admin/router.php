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
'category' => (new CategoriesController())->List(),
'delete_cate' =>(new CategoriesController())->deleteCate(),
'getdataCate' => (new CategoriesController())->getdataCate(),
'edit_cate'=>(new CategoriesController())->editCates(),
'add_cate'=>(new CategoriesController())->addCate(),
'trashCate'=>(new CategoriesController())->ListTrash(),
'edit_status' =>(new CategoriesController())->editStatus(),
'user' => (new UserController())->list(),
'trash_pr'=>(new ProductController())->ListTrash(),
'edit_pr_status' =>(new ProductController())->editStatus(),
'oder_manage' => (new OderController())->Index(),
'get_data_oder' => (new OderController())->getdataOder(),
};