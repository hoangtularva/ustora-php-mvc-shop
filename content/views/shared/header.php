<?php
include_once('content/models/cart.php');
$cart = cart_list();

$get_id = array(
    'order_by' => 'id'
);

$shops = get_all('categories', $get_id);
?>
<!DOCTYPE html>
<html>

<head>
	<base href="<?php echo PATH_URL; ?>" />
	<meta charset="utf-8">
	<title><?php echo isset($title) ? $title : 'Cửa hàng Ustora'; ?></title>
	<meta name="keywords" content="Cửa hàng Ustora - HoangTuIT" />
	<meta name="description" content="Cửa hàng Ustora">
	<meta name="author" content="ustora.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
		rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="public/vendor/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="public/vendor/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="public/vendor/owlcarousel/owl.carousel.min.css" media="screen">
	<link rel="stylesheet" href="public/vendor/owlcarousel/owl.theme.default.min.css" media="screen">
	<link rel="stylesheet" href="public/vendor/magnific-popup/magnific-popup.css" media="screen">
	<link rel="stylesheet" href="public/css/theme.css">
	<link rel="stylesheet" href="public/css/theme-elements.css">
	<link rel="stylesheet" href="public/css/theme-blog.css">
	<link rel="stylesheet" href="public/css/theme-shop.css">
	<link rel="stylesheet" href="public/css/theme-animate.css">
	<link rel="stylesheet" href="public/vendor/rs-plugin/css/settings.css" media="screen">
	<link rel="stylesheet" href="public/vendor/circle-flip-slideshow/css/component.css" media="screen">
	<link rel="stylesheet" href="public/css/skins/default.css">
	<link rel="stylesheet" href="public/css/custom.css">
	<script src="public/vendor/modernizr/modernizr.js"></script>

	<!-- Bootstrap
	 <link rel="stylesheet" href="public/css/bootstrap.min.css"> -->

	<!-- Font Awesome -->
	<link rel="stylesheet" href="public/css/font-awesome.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="public/css/owl.carousel.css">
	<link rel="stylesheet" href="public/css/style.css">
	<link rel="stylesheet" href="public/css/responsive.css">
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="user-menu">
					<ul>
						<li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
						<li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
						<li><a href="cart"><i class="fa fa-user"></i> My Cart</a></li>
						<li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
						<li><a href="#"><i class="fa fa-user"></i> Login</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-4">
				<div class="header-right">
					<ul class="list-unstyled list-inline">
						<li class="dropdown dropdown-small">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
									class="key">currency :</span><span class="value">USD </span><b
									class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">USD</a></li>
								<li><a href="#">INR</a></li>
								<li><a href="#">GBP</a></li>
							</ul>
						</li>

						<li class="dropdown dropdown-small">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
									class="key">language :</span><span class="value">English </span><b
									class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">English</a></li>
								<li><a href="#">French</a></li>
								<li><a href="#">German</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div class="body">
		<header id="header">
			<div class="container">
				<div class="logo">
					<a href="<?php echo PATH_URL; ?>home">
						<img alt="Ustora" width="200" height="100" data-sticky-width="90" data-sticky-height="40"
							src="public/img/logo.png">
					</a>
				</div>
				<div class="search">
					<form id="searchForm" action="<?php echo PATH_URL; ?>search/" method="get">
						<div class="input-group">
							<input type="text" class="form-control search" name="keyword" id="q" placeholder="Search..."
								required>
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
				</div>
				<nav>
					<ul class="nav nav-pills nav-top">
						<li>
							<a href="about-us.html"><i class="fa fa-angle-right"></i>About Us</a>
						</li>
						<li>
							<a href="contact-us.html"><i class="fa fa-angle-right"></i>Contact Us</a>
						</li>
						<li class="phone">
							<span><i class="fa fa-phone"></i>123-456-7890</span>
						</li>
					</ul>
				</nav>
				<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse"
					data-target=".nav-main-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<div class="navbar-collapse nav-main-collapse collapse">
				<div class="container">
					<ul class="social-icons">
						<li class="facebook"><a href="http://www.facebook.com/" target="_blank"
								title="Facebook">Facebook</a></li>
						<li class="twitter"><a href="http://www.twitter.com/" target="_blank"
								title="Twitter">Twitter</a></li>
						<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank"
								title="Linkedin">Linkedin</a></li>
					</ul>
					<nav class="nav-main mega-menu">
						<ul class="nav nav-pills nav-main" id="mainMenu">
							<li class="active">
								<a class="dropdown-toggle" href="<?php echo PATH_URL; ?>home">
									Trang chủ
								</a>
							</li>
							<li>
								<a class="dropdown-toggle" href="shoppage">
									Sản phẩm
								</a>
							</li>
							<!-- HIỂN THỊ DANH MỤC -->
							<?php foreach ($shops as $shop) { ?>
							<li class="dropdown">
								<a class="dropdown-toggle" href="shop/<?php echo $shop['id'] . '-' . $shop['slug']; ?>">
									<?php echo $shop['category_name'] ?>
									<i class="fa fa-angle-down"></i>
								</a>
								<!-- DANH MỤC CON -->

								<ul class="dropdown-menu">
									<?php
										// LẤY ID CỦA DANH MỤC CON TỪ ID DANH MỤC CHÍNH
										$option_subcate = array('where' => $shop['id'] . '=category_id');
										$sub_cate = get_all('subcategory', $option_subcate);
										foreach ($sub_cate as $cate) { ?>
									<li>
										<a href="category/<?php echo $cate['id'] . '-' . $cate['slug']; ?>">
											<?php echo $cate['subcategory_name'] ?>
										</a>
									</li>
									<?php } ?>
								</ul>

							</li>
							<?php } ?>
							<!-- GIỎ HÀNG XỊN -->
							<li class="dropdown mega-menu-item mega-menu-shop">
								<a class="dropdown-toggle mobile-redirect" href="cart">
									<i class="fa fa-shopping-cart"></i> Cart (<?php echo cart_number(); ?>)
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="mega-menu-content">
											<div class="row">
												<div class="col-md-12">
													<table cellspacing="0" class="cart">
														<tbody>
															<?php foreach ($cart as $product_id => $product_cart) { ?>
															<tr>
																<td class="product-thumbnail">
																	<a
																		href="product/<?php echo $product_cart['id'] . '-' . slug($product_cart['name']); ?>">
																		<img width="100" height="100" alt=""
																			class="img-responsive"
																			src="public/upload/products/<?php echo $product_cart['image'] ?>">
																	</a>
																</td>
																<td class="product-name">
																	<a
																		href="product/<?php echo $product_cart['id'] . '-' . slug($product_cart['name']); ?>"><?php echo $product_cart['name'] ?><br><span
																			class="amount"><strong><?php echo $product_cart['price'] ?>
																				VNĐ</strong> - SLượng:
																			<?php echo $product_cart['number'] ?>
																		</span></a>
																</td>
																<td class="product-actions">
																	<a title="Remove this item" class="remove"
																		href="cart/delete/<?php echo $product_cart['id']; ?>">
																		<i class="fa fa-times"></i>
																	</a>
																</td>
															</tr>
															<?php } ?>
															<tr>
																<td class="actions" colspan="6">
																	<div class="actions-continue">
																		<form action="cart"><input type="submit"
																				value="View All"
																				class="btn pull-right btn-primary">
																		</form>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</li>

						</ul>
					</nav>
				</div>
			</div>
		</header>