<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Mes reservations</h3>
        </div>

          <?php
          $n = count($reservation);
          for ($i = 0; $i < $n; $i++){
          ?>

        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">

              <div class="col-md-3">RESERVATION EFFECTUÉE LE:</div>
              <div class="col-md-2">TOTAL:</div>
              <div class="col-md-3">LIVREE A:</div>
              <div class="col-md-2">N° DE RESERVATION</div>

              <div class="col-md-3"><?php echo $reservation[$i]->DateReservation; ?></div>
              <div class="col-md-2"><?php echo $reservation[$i]->MontantRes . " €"; ?></div>
              <div class="col-md-3">

                <a href="#" data-toggle="tooltip"
                title="<?php echo $client[0]->RueClient; ?> <?php echo $client[0]->VilleClient;?> <?php echo $client[0]->CPClient; ?> <?php echo "Tel: " . $client[0]->TelClient; ?>"
                data-placement="auto" >
                <?php echo $client[0]->NomClient . " " . $client[0]->PrenomClient; ?>
                <span class="caret"></span>
                </a>
              </div>

              <div class="col-md-2"><?php echo $reservation[$i]->NumReservation; ?></div>

            </div>
          </div>

          <div class="panel-body">

            <div class="row">
          		<div class="col-md-8">
          			<div class="row">
          				<div class="col-md-4">
                    <h4>Status de la réservation</h4>
          				</div>
                  <div class="col-md-8">
                    <h4>La reservation expirera le: <?php echo $reservation[$i]->DateFinRes; ?></h4>
          				</div>
          			</div>

            			<div class="row">
            				<div class="col-md-12">

                      <table class="table borderless shopping-cart-table">
                        <tbody>
                          <?php
                            $j = $i;
                            while ($j < $n && $reservation[$j]->NumReservation == $reservation[$i]->NumReservation) {
                          ?>

                          <?php $link = $reservation[$j]->ImgProd;
                          $codeProd = $reservation[$j]->CodeProduit;
                          $lien = site_url("Product/product_page/$codeProd");
                          ?>

                            <tr>
                              <td class="thumb"><img src="<?php echo base_url() . "assets/img/" . $link ?>" alt="" ></td>
                              <td class="details">
                                <a href="<?php echo $lien ?>"><?php echo $reservation[$j]->LibelleProduit; ?></a>
                                <ul>
                                  <li><?php echo $reservation[$j]->NomBoutique ?></li>
                                  <li><?php echo $reservation[$j]->PrixProd . "€"; ?></li>
                                  <li><span>Evaluation a mettre</span></li>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Acheter à nouveau</button>
                                </ul>
                              </td>
                              <td  class="details"><strong><?php echo "X ". $reservation[$j]->QteReserver; ?></strong></td>
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
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
