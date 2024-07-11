
<!-- <div id="content"> -->

<!------top-navbar-start----------->

<!-- <div class="top-navbar">
  <div class="xd-topbar">
    <div class="row">
      <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
        <div class="xp-menubar">
          <span class="material-icons text-white">signal_cellular_alt</span>
        </div>
      </div> -->

      <!-- <div class="col-md-5 col-lg-3 order-3 order-md-2">
                     <div class="xp-searchbar">
                         <form>
                            <div class="input-group">
                              <input type="search" class="form-control"
                              placeholder="Search">
                              <div class="input-group-append">
                                 <button class="btn" type="submit" id="button-addon2">Go
                                 </button>
                              </div>
                            </div>
                         </form>
                     </div>
                 </div>
                 
                 
                 <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                     <div class="xp-profilebar text-right">
                        <nav class="navbar p-0">
                           <ul class="nav navbar-nav flex-row ml-auto">
                           <li class="dropdown nav-item active">
                             <a class="nav-link" href="#" data-toggle="dropdown">
                              <span class="material-icons">notifications</span>
                              <span class="notification">4</span>
                             </a>
                              <ul class="dropdown-menu">
                                 <li><a href="#">You Have 4 New Messages</a></li>
                                 <li><a href="#">You Have 4 New Messages</a></li>
                                 <li><a href="#">You Have 4 New Messages</a></li>
                                 <li><a href="#">You Have 4 New Messages</a></li>
                              </ul>
                           </li>
                           
                           <li class="nav-item">
                             <a class="nav-link" href="#">
                               <span class="material-icons">question_answer</span>
                             </a>
                           </li>
                           
                           <li class="dropdown nav-item">
                             <a class="nav-link" href="#" data-toggle="dropdown">
                              <img src="img/user.jpg" style="width:40px; border-radius:50%;"/>
                              <span class="xp-user-live"></span>
                             </a>
                              <ul class="dropdown-menu small-menu">
                                 <li><a href="#">
                                 <span class="material-icons">person_outline</span>
                                 Profile
                                 </a></li>
                                 <li><a href="#">
                                 <span class="material-icons">settings</span>
                                 Settings
                                 </a></li>
                                 <li><a href="#">
                                 <span class="material-icons">logout</span>
                                 Logout
                                 </a></li>
                                 
                              </ul>
                           </li>
                           
                           
                           </ul>
                        </nav>
                     </div>
                 </div> -->

    </div>

    <div class="xp-breadcrumbbar text-center">
      <h4 class="page-title">Product</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active" aria-curent="page">Product</li>
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
              <h2 class="ml-lg-2">Manage Products</h2>
            </div>
            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
              <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                <i class="material-icons">&#xE147;</i>
                <span>Add New Products</span>
              </a>
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
              <th>product_id</th>
              <th>product_name</th>
              <th>product_price</th>
              <th>product_des</th>
              <th>product_quantity</th>
              <th>category_name</th>
              <th>product_view</th>
            </tr>
          </thead>

          <tbody class="list">
           <?php foreach($data['product'] as $key) { ?>
            <tr>
              <th></th>
              <th><?= $key['id'] ?></th>
              <th><?= $key['product_name'] ?></th>
              <th><?= $key['product_price'] ?></th>
              <th><?= $key['product_des'] ?></th>
              <th><?= $key['product_quantity'] ?></th>
              <th><?= $key['category_id'] ?></th>
              <th><?= $key['product_view'] ?></th>
              
           
              <th>
                <a onclick="get_pr_edit('<?= $key['id'] ?>')" href="#editEmployeeModal" class="edit" data-toggle="modal">
                  <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                </a>
                <a onclick="return confirm('chac chưa')" href="index.php?mode=admin&act=delete_pr&id=<?= $key['id'] ?> " class="delete" data-toggle="modal">
                  <i  class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                </a>
              </th>
            </tr>
           <?php } ?>

         
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
          <form action="index.php?mode=admin&act=add_pr" method="POST">
            <div class="modal-body">

              <div class="form-group">
                <label>tên sản phẩm </label>
                <input type="text"  class="form-control" required name="product_name">
              </div>
              <div class="form-group">
                <label>Giá sản phẩm</label>
                <input type="number" class="form-control" required name="product_price">
              </div>
              <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea class="form-control" name="product_des" required></textarea >
              </div>
              <div class="form-group">
                <label>số lượng</label>
                <input type="number" class="form-control" required name="product_quantity">
              </div>
              <div class="form-group">
                <label>ảnh Đại diện sản phẩm</label>
                <input type="file" class="form-control" required name="product_quantity" >
              </div>
              <div class="form-group">
                <label>ảnh mô tả</label>
                <input type="file" class="form-control" required name="product_quantity" multiple="multiple">
              </div>
             
              <div class="form-group">
                <label>loại sản phẩm </label >
              <select name="category_id" id="">
              <?php foreach($data['categories'] as $list) { ?>
               <option value="<?= $list['id'] ?>"><?= $list['category_name'] ?></option>
               <?php } ?>
              </select>
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
          <form action="index.php?mode=admin&act=edit_pr" method="POST">
            <div class="modal-body">
            <div class="form-group" hidden>
                <label>product_id </label>
                <input type="Number" id="pr_id" class="form-control" required name="product_id">
              </div>
              <div class="form-group">
                <label>product_name </label>
                <input type="text" id="pr_name" class="form-control" required name="product_name">
              </div>
              <div class="form-group">
                <label>product_price</label>
                <input type="number" id="pr_price" class="form-control" required name="product_price">
              </div>
              <div class="form-group">
                <label>product_des</label>
                <textarea class="form-control" id="pr_des" name="product_des" required></textarea >
              </div>
              <div class="form-group">
                <label>product_quantity</label>
                <input type="number" class="form-control" id="pr_quantity" required name="product_quantity">
              </div>
              <div class="form-group">
                <label>category_id </label >
              <select name="category_id" id="cate_id">
              <?php foreach($data['categories'] as $list) { ?>
               <option  value="<?= $list['id'] ?>"><?= $list['category_name'] ?></option>
               <?php } ?>
              </select>
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