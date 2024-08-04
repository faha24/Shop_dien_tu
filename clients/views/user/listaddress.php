<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">tài khoản của tôi</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox">
									
									<label for="category-1">
										<span></span>
										<a href="">Hồ sơ</a>
									
									</label>
								</div>
								<div class="input-checkbox">
									
									<label for="category-1">
										<span></span>
										<a href="">Địa chỉ</a>
									
									</label>
								</div>
								<div class="input-checkbox">
									
									<label for="category-1">
										<span></span>
										<a href="">Đơn hàng</a>	
									
									</label>
								</div>
							</div>
						</div>
						
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Danh sách Địa chỉ </h3> <br/><br><br>
								<a class="primary-btn" href="index.php?act=page_adress">Tạo địa chỉ</a>
							</div>
							<?php  foreach($data['address'] as $stt => $key){?>
							<div class="form-group " style="border: 1px solid black; border-radius: 10px; padding: 20px;" >
							<label for="">stt: <span><?=$stt?></span> <br>
								<label for="">Địa chỉ: <span><?=$key['adress_name']?></span>.</label><br>
								<label for="">Tên người nhận : <span><?=$key['name']?></span>.</label><br>
								<label for="">Số điện thoại: <span><?=$key['std']?></span>.</label><br>
								
								<a class="btn btn-danger" style="background-color: #D10024;" href="">sửa</a>
								<a class="btn btn-danger" style="background-color: #D10024;" href="index.php?act=delete_adress&id=<?=$key['id']?>">xóa</a>

							</div>
						
							<?php } ?>
							
						</div>
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>