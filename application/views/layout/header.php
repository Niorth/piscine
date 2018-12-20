<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Marketplace CCI</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" />

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
    <!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="<?php echo base_url() ?>assets/img/cci_herault.jpg" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Enter your keyword">
							<select class="input search-Catégories">
								<option value="0">Toutes les catégories</option>
								<option value="1">Category test01</option>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Mon compte<i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="#" class="text-uppercase">S'identifier</a> / <a href="#" class="text-uppercase">S'inscrire</a>
							<ul class="custom-menu">
								<li><a href="#"><i class="fa fa-user-o"></i>Mon compte</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i>Comparer</a></li>
								<li><a href="#"><i class="fa fa-check"></i>Mes commandes</a></li>
								<li><a href="#"><i class="fa fa-user-plus"></i>Créer un compte</a></li>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">3</span>
								</div>
								<strong class="text-uppercase">Mon panier:</strong>
								<br>
								<span>35,20€</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="./img/thumb-product01.jpg" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">35,20€<span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Le nom de produit va ici</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="./img/thumb-product01.jpg" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">35,20€<span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Le nom de produit va ici</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
									</div>
									<div class="shopping-cart-btns">
										<button class="main-btn">Voir panier</button>
										<button class="primary-btn">Commander <i class="fa fa-arrow-circle-right"></i></button>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

  <!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Catégories <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Vêtements femmes <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="<?php echo base_url() ?>assets/img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NOUVELLES COLLECTION</h2>
												<h3 class="white-color font-weak">BONNE AFFAIRE</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Vêtements hommes</a></li>
						<li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Téléphones et Accessoires<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
									</div>
									<div class="col-md-4 hidden-sm hidden-xs">
										<a class="banner banner-2" href="#">
											<img src="<?php echo base_url() ?>assets/img/banner04.jpg" alt="">
											<div class="banner-caption">
												<h3 class="white-color">NOUVELLES<br>COLLECTION</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Ordinateurs et bureaux</a></li>
						<li><a href="#">Composants électroniques</a></li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Bijoux et montres <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Sacs et chaussures</a></li>
						<li><a href="#">Tout voir</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="#">Accueil</a></li>
						<li><a href="#">Boutique</a></li>
            <li><a href="<?php echo site_url('Product/all_product_page'); ?>">Produit</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Femmes <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="<?php echo base_url() ?>assets/img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NOUVELLE COLECTION</h2>
												<h3 class="white-color font-weak">BONNES AFFAIRES</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Hommes <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="<?php echo base_url() ?>assets/img/banner06.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Femmes</h3>
												</div>
											</a>
											<hr>
										</div>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="<?php echo base_url() ?>assets/img/banner07.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Hommes</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="<?php echo base_url() ?>assets/img/banner08.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Accessoires</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="<?php echo base_url() ?>assets/img/banner09.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Sacs</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Catégories</h3></li>
											<li><a href="#">Vêtements femmes</a></li>
											<li><a href="#">Vêtements hommes</a></li>
											<li><a href="#">Téléphones & Accessoires</a></li>
											<li><a href="#">Bijoux et montres</a></li>
											<li><a href="#">Sacs et chaussures</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Ventes</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="index.html">Accueil</a></li>
								<li><a href="products.html">Produits</a></li>
								<li><a href="product-page.html">Détails Produit</a></li>
								<li><a href="checkout.html">Checkout</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->
