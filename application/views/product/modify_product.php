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

        <div class="col-md-10">
            <div class="section-title">
              <h3 class="title"><?php echo $product[0]['LibelleProduit'] ?></h3>
            </div>

            <form action="<?php echo site_url("Product/update_product") ?>" method="post" id="checkout-form" class="form-horizontal" >

               <input name="CodeProduit" type="hidden" <?php if (isset($product)) echo "value = \"" .  $product[0]['CodeProduit'] . "\""?>>

            <div class="form-group">
              <label class="control-label col-sm-2">Nom :</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="libelle" placeholder="Nom" required <?php if (isset($product)) echo "value = \"" . $product[0]['LibelleProduit'] . "\""?>>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2">Prix :</label>
              <div class="col-sm-10">
                <input class="form-control" type="number" name="prix" placeholder="Prix" step="0.01" min="0.00" required <?php if (isset($product)) echo "value = \"" . $product[0]['PrixProd'] . "\""?>>
              </div>
            </div>

              <div class="form-group">
                  <label class="control-label col-sm-2">Stock Disponible :</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" name="stockDispo"  placeholder="Stock" min="0" required <?php if (isset($product)) echo "value = \"" . $product[0]['StockDispo'] . "\""?>>
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-sm-2">Stock Réel :</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" name="stockReel"  placeholder="Stock" min="0" required <?php if (isset($product)) echo "value = \"" . $product[0]['StockReel'] . "\""?>>
                  </div>
              </div>

            <div class="form-group">
                  <label class="control-label col-sm-2">Durée si réservation:</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" name="duree" placeholder="en jours" required <?php if (isset($product)) echo "value = \"" . $product[0]['DureeReservation'] . "\""?>>
                  </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Description :</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="description" required> <?php if (isset($product)) echo $product[0]['DescriptionProd']?> </textarea>
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2">Catégorie du produit:</label>
              <div class="col-sm-10">
                <select class="form-control" name="categorie" required>
                  <option selected="selected" <?php if (isset($product)) echo "value = \"" . $product[0]['NumCategorieP'] . "\""?>></option>
                  <?php
                      foreach($categorie as $item){
                        $selected = "";
                        if ($product[0]['NumCategorieP'] == $item->NumCategorieP) {
                            $selected = "selected";
                        }
                  ?>
                        <option value="<?php echo $item->NumCategorieP ?> " <?php echo $selected; ?> > <?php echo $item->NomCategorieProduit ?> </option>
                      <?php  } ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="primary-btn" value="Valider">
              </div>
            </div>

        </div>
      </form>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
