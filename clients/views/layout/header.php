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
<?php if(isset($_SESSION['alert'])){ ?>
	<div class="phu_bong"></div>
<div class="thong_bao" role="alert" id="thong_bao" >
<i class="fa fa-check-circle-o"  aria-hidden="true"></i>
<p><?= $_SESSION['alert'] ?></p>
<div class="route">
<button class="btn "><a href="index.php"> trang chủ</a></button>
<button class="btn"><a   href="<?=  $_SESSION['alert'] !="thanh toán thất bại" ? 'index.php?act=oder' : 'index.php?act=cart' ?>">  <?=  $_SESSION['alert'] !="thanh toán thất bại" ? 'trang quản lý' : 'trang giỏ hàng' ?></a></button>

</div>



	</div>
	
<?php } unset($_SESSION['alert']) ; ?>
<?php if(isset($_SESSION['alert_detail'])){ ?>

<div class="thong_bao" role="alert" id="thong_bao1" >
<i class="fa fa-check-circle-o"  aria-hidden="true"></i>
<p><?= $_SESSION['alert_detail'] ?></p>
<div class="route">


</div>



	</div>
	
<?php } unset($_SESSION['alert_detail']) ; ?>


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
									<option value=" ">All Categories</option>
									<option value="rerach2">Category 01</option>
									<option value="rerach3">Category 02</option>
								</select>
								<input class="input" placeholder="Search here" name="search">
								<button class="search-btn" type="submit">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<div>
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>Your Wishlist</span>
									<div class="qty">2</div>
								</a>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a href="index.php?act=cart" class="dropdown-toggle" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="qty">3</div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>

										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product02.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>
									</div>
									<div class="cart-summary">
										<small>3 Item(s) selected</small>
										<h5>SUBTOTAL: $2940.00</h5>
									</div>
									<div class="cart-btns">
										<a href="#">View Cart</a>
										<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
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