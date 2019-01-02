<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Détail de la commande</h3>
        </div>


        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">

              <div class="col-md-3">COMMANDE EFFECTUÉE LE:</div>
              <div class="col-md-2">TOTAL:</div>
              <div class="col-md-3">CLIENT:</div>
              <div class="col-md-2">N° DE COMMANDE</div>

              <div class="col-md-3"><?php echo $commande[0]->DateCommande; ?></div>
              <div class="col-md-2"><?php echo $commande[0]->PrixProd * $commande[0]->QteLigneCommande . " €"; ?></div>
              <div class="col-md-3">

                <a href="#" data-toggle="tooltip"
                title="<?php echo $commande[0]->RueClient; ?> <?php echo $commande[0]->VilleClient;?> <?php echo $commande[0]->CPClient; ?> <?php echo "Tel: " . $commande[0]->TelClient; ?>"
                data-placement="auto" >
                <?php echo $commande[0]->NomClient . " " . $commande[0]->PrenomClient; ?>
                <span class="caret"></span>
                </a>
              </div>

              <div class="col-md-2"><?php echo $commande[0]->NumCommande; ?></div>

            </div>
          </div>

          <div class="panel-body">
            <div class="row">
          		<div class="col-md-8">
          			<div class="row">
          				<div class="col-md-12">
                    <h4><?php echo $commande[0]->StatusLigneCom; ?></h4>
          				</div>
          			</div>
          			<div class="row">
          				<div class="col-md-12">

                    <table class="table borderless shopping-cart-table">

                      <tbody>
                        <?php $link = $commande[0]->ImgProd;
                        $codeProd = $commande[0]->CodeProduit;
                        $lien = site_url("Product/product_page/$codeProd");
                        ?>

                          <tr>
                            <td class="thumb"><img src="<?php echo base_url() . "assets/img/" . $link ?>" alt="" ></td>
                            <td class="details">
                              <a href="<?php echo $lien ?>"><?php echo $commande[0]->LibelleProduit; ?></a>
                              <ul>
                                <li><?php echo $commande[0]->PrixProd . "€"; ?></li>
                                <li><span>Evaluation a mettre</span></li>
                              </ul>
                            </td>
                            <td  class="details"><strong><?php echo "X ". $commande[0]->QteLigneCommande; ?></strong></td>
                          </tr>
                      </tbody>
                    </table>

          				</div>
          			</div>
          		</div>

          		<div class="col-md-4 ">
                <form action="<?php echo site_url("Order/order_update_status"); ?>" method="post" >

                  <input name="idBoutique" type="hidden" <?php echo "value = \"" .  $commande[0]->idBoutique. "\""?>>
                  <input name="NumLigneCommande" type="hidden" <?php echo "value = \"" .  $commande[0]->NumLigneCommande. "\""?>>
                  <input name="NumCommande" type="hidden" <?php echo "value = \"" .  $commande[0]->NumCommande. "\""?>>

                  <div class="form-group">
                    <label for="sel1">Status de la commande: </label>
                      <select name="status" class="form-control" id="sel1">
                        <option value ="traite" <?php if ($commande[0]->StatusLigneCom == "traite") echo "selected" ?>>traitée</option>
                        <option value ="non traite" <?php if ($commande[0]->StatusLigneCom == "non traite") echo "selected" ?>>non traitée</option>
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
