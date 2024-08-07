<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="./lib/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="./lib/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="./lib/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="./lib/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="./lib/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="./lib/css/style.css" />
	<style>
		body {
			position: relative;
		}
		.phu_bong{
			position: absolute;
			width: 100%;
			height: 100%;
			background-color: black;
			opacity: 20%;
			z-index: 900;
		}

		.thong_bao {
			position: absolute;
			background-color: white;

			width: 400px;
			height: 200px;
			border: 1px solid #D10024;
			/* line-height: 150px; */
			top: 20%;
			z-index: 1000;
			left: 500px;
			
			border-radius: 10px;
			i{
				padding-left: 145px;
        font-size: 125px;
		color: #D10024;
			}
			p{
				padding-left: 80px;
			}
			.route{
				button{
					background-color: #D10024;
					&:hover{
						a{
						color: black;
					}
					}
					a{
						color: white;
					}
				}
				padding-left: 80px;
				
			}
		}
	</style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
					<li><a href="index.php<?=isset($_SESSION['username']) ? '?act=user_manager' : "?act=login"?>"><i class="fa fa-user-o"></i> <?= isset($_SESSION['username']) ? $_SESSION['username'] : "Đăng Nhập" ?></a></li>
				<li><a href="index.php?act=<?=isset($_SESSION['username']) ? 'logout' : "reiget"?>"><i class="fa fa-user-o"></i><?= isset($_SESSION['username']) ? 'Đăng xuất' : "Đăng ký" ?></a></li>
			</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./lib/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
                            <form action="index.php?act=search" method="post">
								<select class="input-select" name="select">
									<option value=" ">Tất Cả</option>
									<option value="Laptop Dell">Laptop Dell</option>
									<option value="Laptop Asus">Laptop Asus</option>
									<option value="Laptop MSI">Laptop MSI</option>
									<option value="MacBook">MacBook</option>
								</select>
								<input class="input" placeholder="Tìm kiếm sản phẩm" name="search">
								<button class="search-btn" type="submit">Tìm kiếm</button>
							</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
                                <a href="index.php?act=searchOder" class="dropdown-toggle" aria-expanded="true">
								<i class="fa fa-file-text-o" aria-hidden="true"></i>
									<span>Đơn Hàng</span>
									
								</a>
							
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
                                <div class="dropdown">
							
                                <a href="index.php?act=cart" class="dropdown-toggle" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Giỏ hàng</span>
								
								</a>
								
							</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Tìm kiếm</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Trang chủ</a></li>
							<li class="active">Đơn Hàng</li>
						</ul>
					</div>
                    <div class="col-md-6">
							<div class="header-search" >
								<form action="index.php?act=requestOder" method="post">
									<input class="input" type="text" name="search" placeholder="Tìm kiếm bằng số điện thoại" style="border: 1px solid black; border-radius:50px 0px 0px 50px">
									<button class="search-btn">Tìm kiếm</button>
								</form>
							</div>
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

					<div class="col-md-12">
						<!-- Billing Details -->
						<div class="billing-details">
                      
                            <table class="table">
                            <?php if(!empty($data)){ ?>
								<tr>
									
									<th style="padding-left: 100px;" >Địa Chỉ</th>
                                    <th style="padding-left: 50px;" >Số Điện Thoại</th>
									<th>Ngày Oder</th>
									<th>Tên người nhận</th>
									<th >Tổng Tiền Hóa Đơn</th>
                             
									<th>Trạng thái thanh toán</th>
								</tr>
                                <?php } ?>
                                <?php if(!empty($data)){ foreach($data as $key){ ?>
								<tr>
                            
									
									<th>
										<div class="product-widget">
											
											<div class="product-body">
												<h3 class="product-name"><?=$key['address']?></h3>
												<h4 class="product-price"></h4>
											</div>
										
										</div>
		
									</th>
                                    <th style="text-align: center;"><?=$key['std']?></th>
									<th><?=$key['oderDate']?></th>
									<th>
										<div class="cart_qt" >
											
                                        <?=$key['name']?>
											
											
										</div>
									</th>
									<th><?=$key['total_amount'] ?></th>
                                    <th><?= $key['payment']== 1 ? "Đã thanh toán" : "Chưa thanh toán" ?></th>
								</tr>
                       <?php    } }else{

                        } ?>
							
							</table>
							
						</div>
						<!-- /Billing Details -->

					

					<!-- Order Details -->
				
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
	
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
	
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
