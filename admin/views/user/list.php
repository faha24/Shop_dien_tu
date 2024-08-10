</div>
<div class="xp-breadcrumbbar text-center">
  <h4 class="page-title">Categories</h4>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item active" aria-curent="page">Categories</li>
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
              <h2 class="ml-lg-2">Manage User</h2>
            </div>
            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
              <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                <i class="material-icons">&#xE147;</i>
                <span>Add New Products</span>
              </a> -->
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
              <th>id</th>
              <th>status</th>
              <th>username</th>
              <th>password</th>
             


            </tr>
          </thead>

          <tbody class="list">
            <?php  foreach ($data['user'] as $value => $key) { ?>


              <tr>
                <th></th>
                <th><?= $value+1 ?> </th>
                <th><?=$key['role'] == 1 ? 'hoạt động' : 'bị ban'?></th>
                <th><?= $key['username'] ?></th>
                <th>***********</th>
                


              </th>




                <th>
              <?php if ($key['role'] == 1 ) { ?>
                  <a onclick="return confirm('chac chưa')" href="index.php?mode=admin&act=ban_user&id=<?= $key['id'] ?> " class="delete" data-toggle="modal">
                    <i class="material-icons" data-toggle="tooltip" title="Delete">person_off</i>
                  </a>
                  <?php } else { ?>
                    <a onclick="return confirm('chac chưa')" href="index.php?mode=admin&act=unban_user&id=<?= $key['id'] ?> " class="delete" data-toggle="modal">
                    <i class="material-icons" data-toggle="tooltip" title="Delete">person_add</i>
                  </a>
                    <?php } ?>
                    

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
    <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Thêm Sản Phẩm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="index.php?mode=admin&act=add_cate" method="POST" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label>tên sản phẩm </label>
                <input type="text" class="form-control" required name="product_name">
              </div>

              <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea class="form-control" name="product_des" required></textarea>
              </div>




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
          <form action="index.php?mode=admin&act=edit_cate&status=1" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group" hidden>
                <label>ID</label>
                <input type="text" class="form-control" name="id" id="id_cate">
              </div>
              <div class="form-group">
                <label>tên sản phẩm </label>
                <input type="text" class="form-control" required name="product_name" id="cate_name">
              </div>

              <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea class="form-control" name="product_des" required id="cate_des"></textarea>
              </div>

              <div class="form-group" hidden>
                <label>Status</label>
                <textarea class="form-control" name="status" required id="cate_status"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success" >Add</button>
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
    <p class="mb-0">COPY-BY-DU-AN-1</p>
    </div>
  </div>
</footer>




</div>