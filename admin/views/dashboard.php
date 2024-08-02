<!-- 
 <div id="content"> -->

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
         <h4 class="page-title">Dashboard</h4>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="#">Vishweb</a></li>
           <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
         </ol>
       </div>


     </div>
   </div>
   <!------top-navbar-end----------->


   <!------main-content-start----------->

   <div class="main-content">
     <div class="row">
       <div class="col-md-12">
       <canvas id="myChart" width="400px" height="400px"></canvas>
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
                  <option value="<?= $list['category_id'] ?>"><?= $list['category_name'] ?></option>
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