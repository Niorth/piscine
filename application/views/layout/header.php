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

	<!-- Plugin Table Filter -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-table-filter-control.css" />

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
						<a class="logo" href="http://www.herault.cci.fr/">
							<img src="<?php echo base_url() ?>assets/img/cci_herault2.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">

						<form action="<?php echo site_url("Search/recherche") ?>" method="post">
							<input id='searchBar' name= "recherche" class="input search-input" type="text" placeholder="Entrez votre mot-clé">
							<select name= "cat" class="input search-Catégories">
								<option selected value="0">Toutes les catégories</option>
								<option value="Smartphones">Smartphones</option>
								<option value="GPS">GPS</option>
								<option value="Ordinateur portable">Ordinateur portable</option>
								<option value="Sac à main">Ordinateur</option>
								<option value="Bijoux">Bijoux</option>
								<option value="T-shirt">T-shirt</option>
								<option value="Pull">Pull</option>
								<option value="Pull">Chaussures</option>
								<option value="Audio">Pantalons</option>
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

							<?php if(isset($_SESSION["login"])) { ?>
							<a href="<?php echo site_url('Account/deconnexion'); ?>" class="text-uppercase">Deconnexion</a>
							<?php }else{ ?>
								<a href="<?php echo site_url('Account/connexion_page'); ?>" class="text-uppercase">
									S'identifier
								</a> /
								<a href="<?php echo site_url('Account/create_account_page'); ?>" class="text-uppercase">
									S'inscrire
								</a>
							<?php } ?>

							<ul class="custom-menu">
								<?php if(isset($_SESSION["login"])) { ?>
									<li><a href="<?php echo site_url('Customer/home_page'); ?>"><i class="fa fa-user-o"></i>Mon compte</a></li>
									<li><a href="<?php echo site_url('Customer/all_order_page'); ?>"><i class="fa fa-check"></i>Mes commandes</a></li>
									<li><a href="<?php echo site_url('Customer/all_reservation_page'); ?>"><i class="fa fa-check"></i>Mes reservations</a></li>
									<li><a href="<?php echo site_url('Account/deconnexion'); ?>"><i class="fa fa-power-off"></i>Deconnexion</a></li>
								<?php }else{ ?>
									<li><a href="<?php echo site_url('Account/connexion_page'); ?>"><i class="fa fa-unlock-alt"></i>Se connecter</a></li>
									<li><a href="<?php echo site_url('Account/create_account_page'); ?>"><i class="fa fa-user-plus"></i>Créer un compte</a></li>
								<?php } ?>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
                        <?php
                        if(isset($_SESSION["cartBooking"]) and isset($_SESSION["cartDelivery"])) {
                            $cartBooking = (unserialize($_SESSION["cartBooking"]));
                            $cartDelivery = (unserialize($_SESSION["cartDelivery"]));
                            $total = 0;
                            foreach ($cartBooking as $infos) {
                                $total = $total + $infos[2] * $infos[1];
                            }
                            foreach ($cartDelivery as $infos) {
                                $total = $total + $infos[2] * $infos[1];
                            }
                        }
                        ?>
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty"><?php
                                        if(isset($_SESSION["cartBooking"]) and isset($_SESSION["cartDelivery"])) {
                                            echo(sizeof($cartDelivery) + sizeof($cartBooking));
                                        }
                                        else {
                                            echo("0");
                                        }?></span>
								</div>
								<strong class="text-uppercase">Mon panier:</strong>
								<br>
								<span id = "total"><?php
                                    if(isset($_SESSION["cartBooking"])) {
                                        echo($total);
                                    }
                                    else {
                                        echo("0");
                                    }?>€</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
                                        <h3 class="section-title">Reservations</h3>
                                        <?php
                                        if(isset($_SESSION["cartBooking"])) {
                                            foreach ($cartBooking as $id => $infos) {
                                                ?>
                                                <div class="product product-widget">
                                                    <!--<div class="product-thumb">
                                                        <img src="./img/thumb-product01.jpg" alt="">
                                                    </div> -->
                                                    <div class="product-body headerProductBody" id = "<?php echo($id); ?>">
                                                        <h3 class="product-price"><?php echo($infos[2]); ?>€
                                                            <span class="qty"> x<?php echo($infos[1]); ?></span>
                                                        </h3>
                                                        <h2 class="product-name"><a
                                                                    href="#"><?php echo($infos[0]); ?></a></h2>
                                                        <button class="cancel-btn" id = "cancel_<?php echo($id); ?>"><i class="fa fa-trash"></i></button>
                                                    </div>

                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>

                                        <h3 class="section-title">Commandes</h3>
                                        <?php
                                        if(isset($_SESSION["cartDelivery"])) {
                                            foreach ($cartDelivery as $id => $infos) {
                                                ?>
                                                <div class="product product-widget">
                                                    <!--<div class="product-thumb">
                                                        <img src="./img/thumb-product01.jpg" alt="">
                                                    </div> -->
                                                    <div class="product-body headerProductBody" id = "<?php echo($id); ?>">
                                                        <h3 class="product-price"><?php echo($infos[2]); ?>€
                                                            <span class="qty"> x<?php echo($infos[1]); ?></span>
                                                        </h3>
                                                        <h2 class="product-name"><a
                                                                    href="#"><?php echo($infos[0]); ?></a></h2>
                                                        <button class="cancel-btn" id = "cancel_<?php echo($id); ?>"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
									</div>

									<div class="shopping-cart-btns">
                                        <a href="<?php echo site_url('Cart/cart_page'); ?>"><button class="main-btn">Voir panier<br><i class="fa fa-arrow-circle-right"></i></button></a>

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
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">High-Tech<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Téléphones</h3></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Smartphones") ?>">Téléphones fixes</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Smartphones") ?>">Smartphones</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Smartphones") ?>">Protections</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Smartphones") ?>">Connectique</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Smartphones") ?>">Accessoires</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Ordinateurs</h3></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Ordinateur") ?>">Ordinateurs portables</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Ordinateur") ?>">Ordinateurs fixes</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Ordinateur") ?>">Accessoires</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Ordinateur") ?>">Connectique</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/GPS") ?>">GPS</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Audio</h3></li>
											<li><a href="#">Enceintes fixes</a></li>
											<li><a href="#">Enceintes portatives</a></li>
											<li><a href="#">Casques et écouteurs</a></li>
											<li><a href="#">Accessoires</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="<?php echo base_url() ?>assets/img/hightech-01.jpg" alt="" height="267" width="1060">
											<div class="banner-caption text-center">
												<h2 class="black-color">NOUVELLES COLLECTION</h2>
												<h3 class="black-color font-weak">BONNE AFFAIRE</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Vêtements,bijoux,sacs<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Vêtements</h3></li>
											<li><a href="<?php echo site_url("Search/searchByCat/T-shirt") ?>">T-shirts</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Pull") ?>">Pulls</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/T-shirt") ?>">Vestes</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Pantalons") ?>">Pantalons</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/T-shirt") ?>">Shorts</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Bijoux</h3></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Bijoux") ?>">Bagues</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Bijoux") ?>">Bracelets</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Bijoux") ?>">Colliers</a></li>
											<li><a href="<?php echo site_url("Search/searchByCat/Bijoux") ?>">Montres</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Sacs</h3></li>
											<li><a href="#">Sacs à main</a></li>
											<li><a href="#">Sacs à dos</a></li>
											<li><a href="#">Sacs de voyage</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="<?php echo base_url() ?>assets/img/vetements-01.jpg" alt="" height="267" width="1060">
											<div class="banner-caption text-center">
												<h2 class="white-color">NOUVELLES COLLECTION</h2>
												<h3 class="white-color font-weak">BONNE AFFAIRE</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Chaussures<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Hommes</h3></li>
											<li><a href="#">Baskets</a></li>
											<li><a href="#">Ville</a></li>
											<li><a href="#">Plage</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Femmes</h3></li>
												<li><a href="#">Baskets</a></li>
												<li><a href="#">Ville</a></li>
												<li><a href="#">Plage</a></li>
												<li><a href="#">Talons</a></li>
												<li><a href="#">Bottes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="<?php echo base_url() ?>assets/img/vetements-01.jpg" alt="" height="267" width="1060">
											<div class="banner-caption text-center">
												<h2 class="white-color">NOUVELLES COLLECTION</h2>
												<h3 class="white-color font-weak">BONNE AFFAIRE</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Décorations<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Luminaires</h3></li>
											<li><a href="#">Art&Deco</a></li>
											<li><a href="#">Chill</a></li>
											<li><a href="#">Normal</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Meubles</h3></li>
											<li><a href="#">Chaises</a></li>
											<li><a href="#">Tables</a></li>
											<li><a href="#">Bureaux</a></li>
											<li><a href="#">Armoires</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Art</h3></li>
											<li><a href="#">Vases et scultures</a></li>
											<li><a href="#">Tableaux</a></li>
											<li><a href="#">Innovantions contemporaines</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="<?php echo base_url() ?>assets/img/vetements-01.jpg" alt="" height="267" width="1060">
											<div class="banner-caption text-center">
												<h2 class="white-color">NOUVELLES COLLECTION</h2>
												<h3 class="white-color font-weak">BONNE AFFAIRE</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Livres<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Classiques</h3></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Romans</h3></li>
											<li><a href="#">Aventure</a></li>
											<li><a href="#">Policier</a></li>
											<li><a href="#">Fantaisie</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Biographie</h3></li>
											<li><a href="#">Inintéressant</a></li>
											<li><a href="#">Autobiographie</a></li>
											<li><a href="#">Narcissique</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="<?php echo base_url() ?>assets/img/vetements-01.jpg" alt="" height="267" width="1060">
											<div class="banner-caption text-center">
												<h2 class="white-color">NOUVELLES COLLECTION</h2>
												<h3 class="white-color font-weak">BONNE AFFAIRE</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>

					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="<?php echo site_url('Accueil/home'); ?>">Accueil</a></li>
						<li><a href="<?php echo site_url('Customer/home_page'); ?>">Mon compte</a></li>
						<li><a href="<?php echo site_url('Shop/shop_list_page'); ?>">Boutique</a></li>
						<li><a href="<?php echo site_url('Reduction/list_reduction_client'); ?>">Reduction</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Commandes<i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="<?php echo site_url('Customer/all_order_page'); ?>">Mes commandes</a></li>
								<li><a href="<?php echo site_url('Customer/all_reservation_page'); ?>">Mes Reservation</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
    <script src = "<?php echo base_url(); ?>node_modules/jquery/dist/jquery.min.js"></script>
    <script type='text/javascript'>
        const baseURL= "<?php echo base_url();?>";
    </script>
    <script src = "<?php echo base_url(); ?>js/cart.js"></script>

	<!-- /NAVIGATION -->
