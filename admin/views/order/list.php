</div>
<div class="xp-breadcrumbbar text-center">
    <h4 class="page-title">Order</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active" aria-curent="page">Order</li>
    </ol>
</div>


</div>
</div>
<!------top-navbar-end----------->


<!------main-content-start----------->

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">

                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                            <h2 class="ml-lg-2">Manage Order</h2>
                        </div>
                        <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">

                            <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                <i class="material-icons">&#xE15C;</i>
                <span>Delete</span>
              </a> -->
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <!-- <span class="custom-checkbox">
                  <input type="checkbox" id="selectAll">
                  <label for="selectAll"></label> -->
                            </th>
                            <th>mã order</th>
                            <th>khách hàng</th>
                            <th>ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Số lượng</th>
                            <th>tổng</th>


                        </tr>
                    </thead>

                    <tbody class="list">
                        <?php foreach ($data['order'] as $key) { ?>


                            <tr>
                                <th></th>
                                <th><?= $key['oder_code'] ?> </th>
                                <th><?= $key['name'] ?> <br>
                                    <?= $key['address'] ?> <br>
                                    <?= $key['std'] ?> <br></th>
                                <th><?= $key['oderDate'] ?></th>
                                <th><?php switch ($key['status']) {
                                        case 0:
                                            echo "chờ xác nhận";
                                            break;
                                        case 1:
                                            echo "Đang giao";
                                            break;
                                        case 3:
                                            echo "Thành công";
                                            break;
                                        case 4:
                                            echo "Thất bại";
                                            break;
                                    } ?></th>

                                <th> <?php $qty = 0;
                                        foreach ($data['item'] as $item) {
                                            if ($item['oder_id'] == $key['id']) {
                                                $qty += $item['quantity'];
                                            }
                                        }
                                        echo $qty ?> </th>
                                <th><?= $key['total_amount'] ?></th>



                                <th>
                                    <a onclick="get_oder_edit(<?= $key['id'] ?>)" href="#editEmployeeModal" class="edit" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                    </a>
                                    <a onclick="return confirm('chac chưa')" href="index.php?mode=admin&act=delete_cate&id=<?= $key['id'] ?> " class="delete" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                    </a>
                                </th>
                            </tr>
                        <?php }  ?>


                    </tbody>


                </table>

                <div class="clearfix">
                    <div class="hint-text">showing <b>5</b> out of <b>25</b></div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item "><a href="#" class="page-link">1</a></li>
                        <li class="page-item "><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item "><a href="#" class="page-link">4</a></li>
                        <li class="page-item "><a href="#" class="page-link">5</a></li>
                        <li class="page-item "><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>









            </div>
        </div>


        <!----add-modal start--------->

        <!----edit-modal end--------->





        <!----edit-modal start--------->
        <div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Employees</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="index.php?mode=admin&act=edit_data_oder" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group" hidden >
                                <label>ID</label>
                                <input type="number" class="form-control" name="id_oder" id="id_oder">
                            </div>
                            <select class="form-control" name="oder_status" id="oder_status" required>
                                <option value="0">Đang lên đơn</option>
                                <option value="1">Đang giao</option>
                                <option value="3">Thành công</option>
                                <option value="4">Thất bại</option>
                            </select>
                        
                         


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!----edit-modal end--------->


        <!----delete-modal start--------->
        <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Employees</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Records</p>
                        <p class="text-warning"><small>this action Cannot be Undone,</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">delete</a></button>
                    </div>
                </div>
            </div>
        </div>

        <!----edit-modal end--------->




    </div>
</div>

<!------main-content-end----------->



<!----footer-design------------->

<footer class="footer">
    <div class="container-fluid">
        <div class="footer-in">
            <p class="mb-0">&copy 2021 Vishweb Design . All Rights Reserved.</p>
        </div>
    </div>
</footer>




</div>