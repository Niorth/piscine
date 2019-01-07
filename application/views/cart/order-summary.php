
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style-modal.css">
</head>
<div class="order-summary clearfix" style="margin : 7%">

    <div id="modal" class="modal">
        <div class="modal-content">
            <p><strong>COMMANDE ENREGISTREE</strong></p>
            <p><i class="fa fa-check-circle fa-lg"></i></p>
        </div>
    </div>
							<div class="section-title">
								<h2 class="title">Panier</h2>
							</div>
                            <h3 class="section-title">Reservations</h3>
							<table class="shopping-cart-table table" id="booking">
								<thead>
									<tr>
										<th>Produit</th>
										<th></th>
										<th class="text-center">Prix</th>
										<th class="text-center">Quantité</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
                                <?php
                                $totalBooking = 0;
                                if(isset($_SESSION["cartBooking"]) and isset($_SESSION["cartDelivery"])) {
                                    $cartBooking = unserialize($_SESSION["cartBooking"]);

                                    foreach ($cartBooking as $id => $infos) {
                                        $totalBooking = $totalBooking + $infos[2] * $infos[1]
                                        ?>
                                        <tr id="<?php echo($id); ?>">
                                            <td class="thumb"><img src="./img/thumb-product01.jpg" alt=""></td>
                                            <td class="details">
                                                <a href="#"><?php echo($infos[0]); ?></a>
                                            </td>
                                            <td class="price text-center"><strong><?php echo($infos[2]); ?>
                                                    €</strong><br>
                                            </td>
                                            <td class="qty text-center" id="<?php echo($id); ?>"><input class="input" id="qty" type="number" min="1"
                                                                                                        value=<?php echo($infos[1]); ?>>
                                            </td>
                                            <td class="total text-center"><strong
                                                        class="primary-color" id="total<?php echo($id); ?>"><?php echo($infos[2] * $infos[1]); ?>
                                                    €</strong>
                                            </td>
                                            <td class="text-right">
                                                <button id="<?php echo($id); ?>" class="main-btn icon-btn closeButton"><i
                                                            class="fa fa-close"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>TOTAL RESERVATION</th>
                                    <th colspan="2" class="total" id="totalFinalBooking"><?php echo($totalBooking); ?>€</th>
                                </tr>
                                </tfoot>
                            </table>

                            <br>

                            <h3 class="section-title">Commandes</h3>
                            <table class="shopping-cart-table table" id="delivery">
                                <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th></th>
                                    <th class="text-center">Prix</th>
                                    <th class="text-center">Quantité</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $totalDelivery = 0;
                                if(isset($_SESSION["cartBooking"]) and isset($_SESSION["cartDelivery"])) {
                                    $cartDelivery = unserialize($_SESSION["cartDelivery"]);
                                    foreach ($cartDelivery as $id => $infos) {
                                        $totalDelivery = $totalDelivery + $infos[2] * $infos[1]
                                        ?>
                                        <tr id="<?php echo($id); ?>">
                                            <td class="thumb"><img src="./img/thumb-product01.jpg" alt=""></td>
                                            <td class="details">
                                                <a href="#"><?php echo($infos[0]); ?></a>
                                            </td>
                                            <td class="price text-center"><strong><?php echo($infos[2]); ?>
                                                    €</strong><br>
                                            </td>
                                            <td class="qty text-center" id="<?php echo($id); ?>"><input class="input" id="qty" type="number" min="1"
                                                                                                        value=<?php echo($infos[1]); ?>>
                                            </td>
                                            <td class="total text-center"><strong
                                                        class="primary-color"><?php echo($infos[2] * $infos[1]); ?>
                                                    €</strong>
                                            </td>
                                            <td class="text-right">
                                                <button id="<?php echo($id); ?>" class="main-btn icon-btn closeButton"><i
                                                            class="fa fa-close"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>TOTAL COMMANDE</th>
                                    <th colspan="2" class="total" id="totalFinalDelivery"><?php echo($totalDelivery); ?>€</th>
                                </tr>
                                </tfoot>
                            </table>
                            <?php if($pts >= 100) { ?>
                                <div class="pull-left">
                                    <h4><strong>Vous avez <?php echo $pts ?> points de fidélité</strong></h4>
                                    <h4><strong>Utiliser 100 points pour obtenir une remise de 10% : </strong><input
                                                id="remise" type="checkbox"></h4>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="pull-right">
                                <button class="primary-btn" id="orderButton">Commander</button>
							</div>
						</div>
                        <script src = "<?php echo base_url(); ?>node_modules/jquery/dist/jquery.min.js"></script>
                        <script type = "module" src = "<?php echo base_url(); ?>js/cart_page.js"></script>
