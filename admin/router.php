<?php
// index phục vụ request của admin
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0) {
    match ($route->getAct()) {

        '/' => (new OderController())->Index(),
        'product' => (new ProductController())->List(),
        'add_pr' => (new ProductController())->addproducts(),
        'delete_pr' => (new ProductController())->deleteProduct(),
        'edit_pr' => (new ProductController())->editproducts(),
        'getdata' => (new ProductController())->getdata(),
        'Detail_pr' => (new DetailController())->Index(),
        'add_pr_dt' => (new DetailController())->create(),
        'delete_pr_dt' => (new DetailController())->delete(),
        'edit_pr_dt' =>(new DetailController())->edit(),
        'category' => (new CategoriesController())->List(),
        'delete_cate' => (new CategoriesController())->deleteCate(),
        'getdataCate' => (new CategoriesController())->getdataCate(),
        'edit_cate' => (new CategoriesController())->editCates(),
        'add_cate' => (new CategoriesController())->addCate(),
        'trashCate' => (new CategoriesController())->ListTrash(),
        'edit_status' => (new CategoriesController())->editStatus(),
        'user' => (new UserController())->list(),
        'ban_user' => (new UserController())->ban(),
        'unban_user' => (new UserController())->unban(),
        'trash_pr' => (new ProductController())->ListTrash(),
        'edit_pr_status' => (new ProductController())->editStatus(),
        'oder_manage' => (new OderController())->Index(),
        'get_data_oder' => (new OderController())->getdataOder(),
        'edit_data_oder' => (new OderController())->edit_order(),
        'comment' =>(new commentController())->list(),
        'ban_comment' => (new commentController())->ban(),
        'unban_comment' => (new commentController())->unban(),
        'voucher' => (new VoucherController())->list(),
        'add_voucher' =>(new VoucherController())->add(),
        'edit_voucher' => (new VoucherController())->edit(),
        'getdatavr' => (new DetailController())->get_data(),
    };
} else {
    $route->redirectClient('');
}
// kiểm tra act và điều hướng tới các controller phù hợp
