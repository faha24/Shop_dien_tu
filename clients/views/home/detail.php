
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

<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<?php foreach ($data['imgs'] as $img) { ?>
						<div class="product-preview">
							<img src="./lib/img/products/<?= $img['path'] ?>" alt="" style="width : 458px; height:458px ; ">
						</div>
					<?php  } ?>


				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					<?php foreach ($data['imgs'] as $img) { ?>
						<div class="product-preview">
							<img src="./lib/img/products/<?= $img['path'] ?>" alt="" style="width : 153px; height:153px ; ">
						</div>
					<?php  } ?>

				</div>
			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<form action="index.php?act=add_to_cart&id=<?= $_GET['id'] ?>" method="post">
						<h2 class="product-name" id="product_name"><?= $data['product']['product_name'] ?></h2>
						<div>
						
			
						</div>
						<div>
							<h3 class="product-price" id="pr_price">$<?= $data['product']['Detail_status'] == 0 ? $data['variant'][0]['price'] :  $data['product']['price']  ?> </h3>
						
						</div>
						<p><?= $data['product']['product_des'] ?></p>
						<input type="hidden" name="img" value="<?= $data['imgs'][0]['path'] ?>">
						<input type="hidden" name="pr_id" value="<?= $_GET['id'] ?>">
						<input type="hidden" name="pr_name" value="<?= $data['product']['product_name'] ?>">
						<input type="hidden" name="pr_price"  id="pr_varariant_price" value="<?= $data['product']['Detail_status'] == 0 ? $data['variant'][0]['price'] :  $data['product']['price'] ?>">
						<?php if ($data['product']['Detail_status'] == 0) { ?>
							<div class="product-options">

								<label>
									Màu
									<select name="color" class="input-select" id="colorSelect">
										<?php
										// Mảng để lưu các id màu đã được xuất hiện
										$usedColors = array();

										// Duyệt qua mảng color
										foreach ($data['color'] as $color) {
											// Kiểm tra nếu màu đã xuất hiện, bỏ qua
											if (in_array($color['id'], $usedColors)) {
												continue;
											}

											// Đánh dấu màu đã xuất hiện
											$usedColors[] = $color['id'];

											// Tìm các biến thể liên quan đến màu này
											$variants = array_filter($data['variant'], function ($variant) use ($color) {
												return $variant['color_id'] == $color['id'];
											});

											// Nếu có biến thể liên quan, hiển thị tùy chọn
											if (!empty($variants)) {
										?>
												<option id="coloroption" color_id="<?= $color['id'] ?>" value="<?= $color['color_name'] ?>"><?= $color['color_name'] ?></option>
										<?php
											}
										}
										?>
									</select>
								</label>


							</div>
						<?php } ?>
						<div class="add-to-cart">
							<div class="qty-label">
								Số Lượng
								<div class="input-number">
									<input type="number" name="pr_qty" value="1">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng</button>
						</div>

					

						<ul class="product-links">
							<li>Danh Mục:</li>
							<li><a href="#"><?= $data['product']['category_name'] ?></a></li>
							<!-- <li><a href="#">Accessories</a></li> -->

						</ul>

					

					</form>
				</div>

			</div>
			<!-- /Product details -->

			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#tab1">Mô Tả</a></li>
						
						<li><a data-toggle="tab" href="#tab3">Bình Luận</a></li>
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab1  -->
						<div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									<p><?= $data['product']['product_des'] ?></p>
								</div>
							</div>
						</div>
						<!-- /tab1  -->

						<!-- tab2  -->
					
						<!-- /tab2  -->

						<!-- tab3  -->
						<div id="tab3" class="tab-pane fade in">
							<div class="row">
								<!-- Rating -->
								<!-- <div class="col-md-3">
									<div id="rating">
										<div class="rating-avg">
											<span>4.5</span>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<ul class="rating">
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-progress">
													<div style="width: 80%;"></div>
												</div>
												<span class="sum">3</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div style="width: 60%;"></div>
												</div>
												<span class="sum">2</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
										</ul>
									</div>
								</div> -->
								<!-- /Rating -->

								<!-- Reviews -->
								<div class="col-md-6">
									<div id="reviews">
										<ul class="reviews">
											<?php foreach($data['comment'] as $comment) { 
												if($comment['status'] != 2 ){
												?>
												
											<li>
												<div class="review-heading">
													<h5 class="name"><?=$comment['username']?></h5>
													
												</div>
												<div class="review-body">
													<p><?=$comment['content']?></p>
												</div>
											</li>
											<?php }} ?>
										
										</ul>
										<ul class="reviews-pagination">
											<li class="active">1</li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
										</ul>
									</div>
								</div>
								<!-- /Reviews -->

								<!-- Review Form -->
								<div class="col-md-6">
									
									<div id="review-form">
										<form class="review-form" method="POST" action ="index.php?act=comment">
											
											<textarea class="input" required name="content"  <?= isset($_SESSION['username']) ? 'placeholder="comment" ' : 'placeholder="mời bạn đăng nhập" disabled' ?>></textarea>
											<input type="hidden" name="pr_id" value="<?= $_GET['id']?>">
											<input type="hidden" name="user_id" value="<?= isset($_SESSION['user_id']) ?$_SESSION['user_id'] : "" ?>">
											<button class="primary-btn">Submit</button>
										</form>
									</div>
									
								</div>
								<!-- /Review Form -->
							</div>
						</div>
						<!-- /tab3  -->
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->

<!-- /Section -->

<!-- NEWSLETTER -->
