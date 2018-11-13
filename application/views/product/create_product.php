<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 13/11/2018
 * Time: 08:11
 */
?>

<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <form action="<?php echo site_url("Product/$action") ?>" method="post" id="checkout-form" class="clearfix" >

          <input name="key" type="hidden" <?php if (isset($key)) echo "value = \"" .  $key . "\""?>>

        <div class="col-md-6">
          <div class="billing-details">
            <div class="section-title">
              <h3 class="title">Créer un produit</h3>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Libellé :</label>
              <input class="input" type="text" name="libelle" placeholder="Libellé" required <?php if (isset($product)) echo "value = \"" . $product[0]['LibelleProduit'] . "\""?>>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Prix :</label>
              <input class="input" type="text" name="prix" placeholder="Prix" required  <?php if (isset($product)) echo "value = \"" . $product[0]['PrixProd'] . "\""?>>
            </div>
              <div class="form-group">
                  <label class=" form-control-label">Stock Disponible :</label>
                  <input class="input" type="text" name="stockDispo" placeholder="Stock" required  <?php if (isset($product)) echo "value = \"" . $product[0]['StockDispo'] . "\""?>>
              </div>
            <div class="form-group">
                  <label class=" form-control-label">Durée de la reservation :</label>
                  <input class="input" type="text" name="duree" placeholder="Durée" required  <?php if (isset($product)) echo "value = \"" . $product[0]['DureeReservation'] . "\""?>>
              </div>
              <div class="form-group">
                  <label class=" form-control-label">Description :</label>
                  <input class="input" type="text" name="description" placeholder="Description" required  <?php if (isset($product)) echo "value = \"" . $product[0]['DescriptionProd'] . "\""?>>
              </div>
            <div class="form-group">
              <label class=" form-control-label">idBoutique (a supprimer) :</label>
              <input class="input" type="text" name="id" placeholder="id" required>
            </div>

            <input type="submit" class="primary-btn" value="Valider">
          </div>
        </div>
      </form>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
