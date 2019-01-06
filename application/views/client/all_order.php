<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Mes commandes</h3>
        </div>



      <div class="col-md-12">
        <div class="product-tab">
          <ul class="tab-nav">
            <li class="active"><a data-toggle="tab" href="#tab1">Commandes traités</a></li>
            <li><a data-toggle="tab" href="#tab2">Commandes en cours</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab1" class="tab-pane fade in active">
              <?php
              $n = count($commande);
              for ($i = 0; $i < $n; $i++){
              ?>

            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">

                  <div class="col-md-3">COMMANDE EFFECTUÉE LE:</div>
                  <div class="col-md-2">TOTAL:</div>
                  <div class="col-md-3">LIVREE A:</div>
                  <div class="col-md-2">N° DE COMMANDE</div>

                  <div class="col-md-3"><?php echo $commande[$i]->DateCommande; ?></div>
                  <div class="col-md-2"><?php echo $commande[$i]->MontantCom . " €"; ?></div>
                  <div class="col-md-3">

                    <a href="#" data-toggle="tooltip"
                    title="<?php echo $client[0]->RueClient; ?> <?php echo $client[0]->VilleClient;?> <?php echo $client[0]->CPClient; ?> <?php echo "Tel: " . $client[0]->TelClient; ?>"
                    data-placement="auto" >
                    <?php echo $client[0]->NomClient . " " . $client[0]->PrenomClient; ?>
                    <span class="caret"></span>
                    </a>
                  </div>

                  <div class="col-md-2"><?php echo $commande[$i]->NumCommande; ?></div>

                </div>
              </div>

              <div class="panel-body">

                <div class="row">
              		<div class="col-md-8">
              			<div class="row">
              				<div class="col-md-12">
                        <h4>Livré</h4>
              				</div>
              			</div>

                			<div class="row">
                				<div class="col-md-12">

                          <table class="table borderless shopping-cart-table">
                            <tbody>
                              <?php
                                $j = $i;
                                while ($j < $n && $commande[$j]->NumCommande == $commande[$i]->NumCommande) {
                              ?>

                              <?php $link = $commande[$j]->ImgProd;
                              $codeProd = $commande[$j]->CodeProduit;
                              $lien = site_url("Product/product_page/$codeProd");
                              ?>

                                <tr>
                                  <td class="thumb"><img src="<?php echo base_url() . "assets/img/" . $link ?>" alt="" ></td>
                                  <td class="details">
                                    <a href="<?php echo $lien ?>"><?php echo $commande[$j]->LibelleProduit; ?></a>
                                    <ul>
                                      <li><?php echo $commande[$j]->NomBoutique ?></li>
                                      <li><?php echo $commande[$j]->PrixProd . "€"; ?></li>
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Acheter à nouveau</button>
                                    </ul>
                                  </td>
                                  <td  class="details"><h3><?php echo "X ". $commande[$j]->QteCommander; ?></h3></td>
                                </tr>

                                <?php $j++; } ?>
                            </tbody>
                          </table>

                				</div>
                			</div>

              		</div>
              		<div class="col-md-4 ">

              		</div>
              	</div>
              </div>
            </div>

          <?php $i = $j -1;} ?>
            </div>

            <div id="tab2" class="tab-pane fade in">
              <?php
              $n = count($commande_c);
              for ($i = 0; $i < $n; $i++){
              ?>

            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">

                  <div class="col-md-3">COMMANDE EFFECTUÉE LE:</div>
                  <div class="col-md-2">TOTAL:</div>
                  <div class="col-md-3">LIVREE A:</div>
                  <div class="col-md-2">N° DE COMMANDE</div>

                  <div class="col-md-3"><?php echo $commande_c[$i]->DateCommande; ?></div>
                  <div class="col-md-2"><?php echo $commande_c[$i]->MontantCom . " €"; ?></div>
                  <div class="col-md-3">

                    <a href="#" data-toggle="tooltip"
                    title="<?php echo $client[0]->RueClient; ?> <?php echo $client[0]->VilleClient;?> <?php echo $client[0]->CPClient; ?> <?php echo "Tel: " . $client[0]->TelClient; ?>"
                    data-placement="auto" >
                    <?php echo $client[0]->NomClient . " " . $client[0]->PrenomClient; ?>
                    <span class="caret"></span>
                    </a>
                  </div>

                  <div class="col-md-2"><?php echo $commande_c[$i]->NumCommande; ?></div>

                </div>
              </div>

              <div class="panel-body">

                <div class="row">
              		<div class="col-md-8">
              			<div class="row">
              				<div class="col-md-12">
                        <h4>Commande en cours de traitement</h4>
              				</div>
              			</div>

                			<div class="row">
                				<div class="col-md-12">

                          <table class="table borderless shopping-cart-table">
                            <tbody>
                              <?php
                                $j = $i;
                                while ($j < $n && $commande_c[$j]->NumCommande == $commande_c[$i]->NumCommande) {
                              ?>

                              <?php $link = $commande_c[$j]->ImgProd;
                              $codeProd = $commande_c[$j]->CodeProduit;
                              $lien = site_url("Product/product_page/$codeProd");
                              ?>

                                <tr>
                                  <td class="thumb"><img src="<?php echo base_url() . "assets/img/" . $link ?>" alt="" ></td>
                                  <td class="details">
                                    <a href="<?php echo $lien ?>"><?php echo $commande_c[$j]->LibelleProduit; ?></a>
                                    <ul>
                                      <li><?php echo $commande_c[$j]->NomBoutique ?></li>
                                      <li><?php echo $commande_c[$j]->PrixProd . "€"; ?></li>
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Acheter à nouveau</button>
                                    </ul>
                                  </td>
                                  <td  class="details"><strong><?php echo "X ". $commande_c[$j]->QteCommander; ?></strong></td>
                                </tr>

                                <?php $j++; } ?>
                            </tbody>
                          </table>

                				</div>
                			</div>

              		</div>
              		<div class="col-md-4 ">

              		</div>
              	</div>
              </div>
            </div>

          <?php $i = $j -1;} ?>


            </div>

          </div>

        </div>
      </div>

      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
