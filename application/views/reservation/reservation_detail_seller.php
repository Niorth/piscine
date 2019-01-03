<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Détail de la Reservation </h3>
        </div>


        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">

              <div class="col-md-3">RESERVATION EFFECTUÉE LE:</div>
              <div class="col-md-2">TOTAL:</div>
              <div class="col-md-3">CLIENT:</div>
              <div class="col-md-2">N° DE RESERVATION</div>

              <div class="col-md-3"><?php echo $reservation[0]->DateReservation; ?></div>
              <div class="col-md-2"><?php echo $reservation[0]->PrixProd * $reservation[0]->QteLigneRes . " €"; ?></div>
              <div class="col-md-3">

                <a href="#" data-toggle="tooltip"
                title="<?php echo $reservation[0]->RueClient; ?> <?php echo $reservation[0]->VilleClient;?> <?php echo $reservation[0]->CPClient; ?> <?php echo "Tel: " . $reservation[0]->TelClient; ?>"
                data-placement="auto" >
                <?php echo $reservation[0]->NomClient . " " . $reservation[0]->PrenomClient; ?>
                <span class="caret"></span>
                </a>
              </div>

              <div class="col-md-2"><?php echo $reservation[0]->NumReservation; ?></div>

            </div>
          </div>

          <div class="panel-body">
            <div class="row">
          		<div class="col-md-8">
          			<div class="row">
          				<div class="col-md-4">
                    <h4><?php echo $reservation[0]->StatusLigneRes; ?></h4>
          				</div>
                  <div class="col-md-8">
                    <h4 class="fontcolorred">La reservation expirera le: <?php echo $reservation[0]->DateFinRes; ?></h4>
          				</div>
          			</div>
          			<div class="row">
          				<div class="col-md-12">

                    <table class="table borderless shopping-cart-table">

                      <tbody>
                        <?php $link = $reservation[0]->ImgProd;
                        $codeProd = $reservation[0]->CodeProduit;
                        $lien = site_url("Product/product_page/$codeProd");
                        ?>

                          <tr>
                            <td class="thumb"><img src="<?php echo base_url() . "assets/img/" . $link ?>" alt="" ></td>
                            <td class="details">
                              <a href="<?php echo $lien ?>"><?php echo $reservation[0]->LibelleProduit; ?></a>
                              <ul>
                                <li><?php echo $reservation[0]->PrixProd . "€"; ?></li>
                                <li><span>Evaluation a mettre</span></li>
                              </ul>
                            </td>
                            <td  class="details"><strong><?php echo "X ". $reservation[0]->QteLigneRes; ?></strong></td>
                          </tr>
                      </tbody>
                    </table>

          				</div>
          			</div>
          		</div>

          		<div class="col-md-4 ">
                <form action="<?php echo site_url("Reservation/reservation_update_status"); ?>" method="post" >

                  <input name="idBoutique" type="hidden" <?php echo "value = \"" .  $reservation[0]->idBoutique. "\""?>>
                  <input name="NumLigneRes" type="hidden" <?php echo "value = \"" .  $reservation[0]->NumLigneRes. "\""?>>
                  <input name="NumReservation" type="hidden" <?php echo "value = \"" .  $reservation[0]->NumReservation. "\""?>>

                  <div class="form-group">
                    <label for="sel1">Status de la reservation: </label>
                      <select name="status" class="form-control" id="sel1">
                        <option value ="traite" <?php if ($reservation[0]->StatusLigneRes == "traite") echo "selected" ?>>traitée</option>
                        <option value ="non traite" <?php if ($reservation[0]->StatusLigneRes == "non traite") echo "selected" ?>>non traitée</option>
                      </select>
                      <br>
                    <button type="submit" class="btn btn-success">Valider</button>
                  </div>

                </form>
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
