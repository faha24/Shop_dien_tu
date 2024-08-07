<?php

$data = array_map(function($item) {
    if (is_array($item)) {
        return array_filter($item, function($subItem) {
            return $subItem !== '';
        });
    }
    return $item;
}, $data);
$data = array_filter($data, function($item) {
    return !empty($item) && $item !== '';
});
 ?>
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
										<a href="index.php?act=user_manager">Hồ sơ</a>
									
									</label>
								</div>
								<div class="input-checkbox">
									
									<label for="category-1">
										<span></span>
										<a href="index.php?act=address">Địa chỉ</a>
									
									</label>
								</div>
								<div class="input-checkbox">
									
									<label for="category-1">
										<span></span>
										<a href="index.php?act=oder">Đơn hàng</a>	
									
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
							<div><h1>đơn hàng</h1></div>
						<table class="table" id="bang">
                            <tr>
                                <th>mã đơn hàng</th>
                                <th>sản phẩm </th>
                                <th>giá</th>
                                <th>số lượng</th>
								<th>trạng thái thanh toán</th>
                                <th>trạng thái</th>
                            </tr>
                            <?php if(isset($data)) { ?>
                            <?php foreach ($data as $key => $cart) : ?>
                            
                                <tr>
                                    <th> <?= $cart['oder_code'] ?> </th>
                                    <th>
                                        <div class="product-widget">
                                           
                                            <div class="product-body">
											<div class="product-img">
                                        <img src="./lib/img/products/<?= $cart['path'] ?>" alt="">
                                    </div>
                                                <h3 class="product-name"><a href="#"><?= $cart['product_name'] ?></a></h3>
                                                <h4 class="product-price">$<?= $cart['price'] ?></h4><span></span>
                                            </div>

                                        </div>

                                    </th>
                                    <th><?= $cart['subtotals'] ?></th>
									
                                    <th>
                                        <div class="cart_qt">
                                            
                                            <input type="number" disabled name="qty[<?= $key ?>]" style="width: 20px;" id="qty" value="<?= $cart['quantity'] ?>">
                                           
                                        </div>
                                    </th>
								 
									<th><?= $cart['payment']== 1 ? "Đã thanh toán" : "Chưa thanh toán" ?></th>
                                    <th id="product-price"><?php switch ($cart['status']) {
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
                                    <th hidden><?= $cart['price'] ?></th>
                                 
                                </tr>
                            <?php endforeach; ?>
                            <?php  } ?>

                            <!-- <tr>
                 
                            <th>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/product01.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">980.00</h4><span>$</span>
                                    </div>

                                </div>

                            </th>
                            <th>product name goes here</th>
                            <th>
                                <div class="cart_qt"> 
                                    1
                                
                                </div>
                            </th>
                            <th id="product-price">98000</th>
                           
                            <th> đang giao</th>
                        </tr> -->
                        </table>
						
							
							
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