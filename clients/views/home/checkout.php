<?php
// $data = array_map(function($item) {
//     if (is_array($item)) {
//         return array_filter($item, function($subItem) {
//             return $subItem !== '';
//         });
//     }
//     return $item;
// }, $data);

// // Loại bỏ phần tử mảng chuỗi trống
// $data = array_filter($data, function($item) {
//     return !empty($item) && $item !== '';
// });
$total_amount = 0;
foreach ($data['data_oder'] as $item) {
	$total_amount += $item['subtotal'];
} 

$json_data = json_encode($data['data_oder']);
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
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Checkout</li>
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
		<form action="index.php?act=add_oder" method="post">
			<div class="row">

				<div class="col-md-7">
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Billing address</h3>
						</div>
						<?php if (isset($data['user'])) { ?>

							<div class="form-group">
								<input class="input" type="text" id="name" name="name" placeholder="name" required>

							</div>
							<div class="form-group">
								<input class="input" type="text" id="address" name="address" placeholder="Address" required>
							</div>

							<div class="form-group">
								<input class="input" type="tel" id="tel" name="tel" placeholder="Telephone" required>
							</div>

							<?php if ($data['adress'] != null) { ?>
								<div class="form-group">
									<div class="input-checkbox">
										<input type="checkbox" id="create-account"  name="check"> 
										<label for="create-account">
											<span></span>
											chọn thông tin có sẵn
										</label>
										<div class="caption">
										<select class="input" name="name1" id="">
											
											<?php foreach ($data['adress'] as $key) { ?>
												<option value="<?= $key['name'] ?>"><?= $key['name'] ?></option>
											<?php } ?>
										</select> <br> <br>
											<select class="input" name="adress1" id="">
											
												<?php foreach ($data['adress'] as $key) { ?>
													<option value="<?= $key['adress_name'] ?>"><?= $key['adress_name'] ?></option>
												<?php } ?>
											</select>
											<br><br>
											<select class="input" name="telephone1" id="">
										<?php foreach ($data['adress'] as $key) { ?>
											<option value="<?= $key['std'] ?>"><?= $key['std'] ?></option>
										<?php } ?>

									</select> <br> <br>
										</div>
									</div>
								</div>
							

							<?php } ?>
						<?php } else { ?>
							<div class="form-group">
								<input class="input" type="text" id="name" name="name" placeholder="name" required>

							</div>
							<div class="form-group">
								<input class="input" type="text" id="address" name="address" placeholder="Address" required>
							</div>

							<div class="form-group">
								<input class="input" type="tel" id="tel" name="tel" placeholder="Telephone" required>
							</div>
						<?php } ?>
							

						<input type="hidden" name="amount" value="<?= $total_amount ?>">
						<input type="hidden" name="item[]" value="<?= htmlspecialchars($json_data, ENT_QUOTES, 'UTF-8') ?>">
						<?php if (isset($_SESSION['user_id'])) { ?>
							<input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
						<?php } ?>
						<!-- <div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Create Account?
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
										<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div> -->
					</div>
					<!-- /Billing Details -->

					<!-- Shiping Details -->
					<!-- <div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Shiping address</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="first-name" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="last-name" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city" placeholder="City">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="country" placeholder="Country">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="tel" placeholder="Telephone">
									</div>
								</div>
							</div>
						</div> -->
					<!-- /Shiping Details -->

					<!-- Order notes -->
					<!-- <div class="order-notes">
							<textarea class="input" placeholder="Order Notes"></textarea>
						</div> -->
					<!-- /Order notes -->
				</div>

				<!-- Order Details -->
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Your Order</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUCT</strong></div>
							<div><strong>TOTAL</strong></div>
						</div>
						<div class="order-products">

							<?php foreach ($data['data_oder'] as $pr) { ?>
								<div class="order-col">
									<div><?= $pr['qty'] ?>x <?= $pr['product_name'] ?></div>
									<div>$<?= $pr['subtotal'] ?></div>
								</div>
							<?php } ?>

						</div>
						<div class="order-col">
							<div>Shiping</div>
							<div><strong>FREE</strong></div>
						</div><div class="order-col" >
							<div>giảm giá </div>
							<div><strong id="sales">0%</strong></div>
							
						</div>
						<div id="form_sale"></div>
						<div class="order-col" >
							<div><strong>TOTAL</strong></div>
							<div style="font-size: 24px; color: #D10024;">$<strong class="order-total" id="total"><?= $total_amount ?></strong></div> 

							
						</div>
						<div class="header-search">
						
						<div><strong>mã giảm giá</strong></div> <br>	
								<input id ="voucher_input" class="input" placeholder="Search here" name="search"> <br> <br> <a onclick="get_voucher()" class="btn btn-danger">sử dụng </a>
							
							
						</div>
					</div>
					<div class="payment-method">
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-1" value="not_paymet"> 
							<label for="payment-1">
								<span></span>
								Thanh toán khi nhận hàng
							</label>
							<div class="caption">
								<p>thanh toán khi nhận hàng</p>
							</div>
						</div>
						
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-3" value="payment">
							<label for="payment-3">
								<span></span>
							thanh toán online
							</label>
							<div class="caption">
								<p>thanh toán online</p>
							</div>
						</div>
					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="terms">
						<label for="terms">
							<span></span>
							I've read and accept the <a href="#">terms & conditions</a>
						</label>
					</div>
					<button type="submit" name="redirect" class="primary-btn order-submit">Place order</button>
				</div>
				<!-- /Order Details -->
			</div>
		</form>
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
<script>
	  document.addEventListener('DOMContentLoaded', function () {
        const checkbox = document.getElementById('create-account');
		const name =document.getElementById('name');
		const address =document.getElementById('address');
		const tel =document.getElementById('tel');
        
		
		checkbox.addEventListener('change', function () {
            if (this.checked) {
                // Ẩn các trường nhập liệu nếu checkbox được chọn
                name.style.display = 'none';
                address.style.display = 'none';
                tel.style.display = 'none';

                // Loại bỏ thuộc tính required
                document.getElementById('name').removeAttribute('required');
                document.getElementById('address').removeAttribute('required');
                document.getElementById('tel').removeAttribute('required');
            } else {
                // Hiển thị lại các trường nhập liệu nếu checkbox không được chọn
                name.style.display = 'block';
                address.style.display = 'block';
                tel.style.display = 'block';

                // Thêm thuộc tính required
                document.getElementById('name').setAttribute('required', 'required');
                document.getElementById('address').setAttribute('required', 'required');
                document.getElementById('tel').setAttribute('required', 'required');
            }
        });
    });
</script>
<!-- /NEWSLETTER -->

<!-- FOOTER -->