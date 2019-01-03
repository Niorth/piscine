<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Panier</h3>
							</div>
							<table class="shopping-cart-table table">
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
                                if(isset($_SESSION["cart"])) {
                                    $cart = unserialize($_SESSION["cart"]);
                                    $total = 0;
                                    foreach ($cart as $id => $infos) {
                                        $total = $total + $infos[2] * $infos[1]
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
                                                <button id="<?php echo($id); ?>" class="main-btn icon-btn"><i
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
                                    <th>TOTAL</th>
                                    <th colspan="2" class="total" id="totalFinal"><?php echo($total); ?>€</th>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="pull-right">
                                <button class="primary-btn">Commander</button>
							</div>
						</div>
                        <script src = "<?php echo base_url(); ?>node_modules/jquery/dist/jquery.min.js"></script>
                        <script type = "module" src = "<?php echo base_url(); ?>js/cart_page.js"></script>
