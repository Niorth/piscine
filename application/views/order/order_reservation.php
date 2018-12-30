<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

        <div class="col-md-12">
          <div class="section-title">
            <h3 class="title">Mes Commandes</h3>
          </div>

          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-center">Commande N°</th>
                <th class="text-center">Nom du Produit</th>
                <th class="text-center">Status</th>
                <th class="text-center">Date commande</th>
                <th class="text-center">Quantité</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($c_nontraite as $item){
                $lien = "lien vers la commande"/*site_url("Product/product_page/$item->CodeProduit")*/;
              ?>
                <tr class="info">
                  <td class="text-center"><?php echo $item->NumLigneCommande; ?></td>
                  <td class="text-center"><?php echo $item->LibelleProduit; ?></td>
                  <td class="text-center"><?php echo $item->StatusLigneCom; ?></td>
                  <td class="text-center"><?php echo $item->DateCommande; ?></td>
                  <td class="text-center"><?php echo $item->QteLigneCommande; ?></td>
                  <td class="text-center">
                    <a href="<?php echo $lien ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php } ?>

              <?php
                foreach ($c_traite as $item){
                $lien1 = "lien vers la commande"/*site_url("Product/product_page/$item->CodeProduit")*/;
              ?>
                <tr class="success">
                  <td class="text-center"><?php echo $item->NumLigneCommande; ?></td>
                  <td class="text-center"><?php echo $item->LibelleProduit; ?></td>
                  <td class="text-center"><?php echo $item->StatusLigneCom; ?></td>
                  <td class="text-center"><?php echo $item->DateCommande; ?></td>
                  <td class="text-center"><?php echo $item->QteLigneCommande; ?></td>
                  <td class="text-center">
                    <a href="<?php echo $lien1 ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
      <!-- /row -->

    <!-- row -->
    <div class="row">

        <div class="col-md-12">

            <div class="section-title">
              <h3 class="title">Mes Réservations</h3>
            </div>

          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <tr>
                  <th class="text-center">Reservation N°</th>
                  <th class="text-center">Nom du Produit</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Date reservation</th>
                  <th class="text-center">Date fin reservation</th>
                  <th class="text-center">Quantité</th>
                  <th class="text-center">Action</th>
                </tr>

              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($r_notPrepared as $item){
                $lien2 = "lien vers la reservation"/*site_url("Product/product_page/$item->CodeProduit")*/;
              ?>

              <tr class="info">
                <td class="text-center"><?php echo $item->NumLigneRes; ?></td>
                <td class="text-center"><?php echo $item->LibelleProduit; ?></td>
                <td class="text-center"><?php echo $item->StatusLigneRes; ?></td>
                <td class="text-center"><?php echo $item->DateReservation; ?></td>
                <td class="text-center"><?php echo $item->DateFinRes; ?></td>
                <td class="text-center"><?php echo $item->QteLigneRes; ?></td>
                <td class="text-center">
                  <a href="<?php echo $lien2 ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                </td>
              </tr>

              <?php } ?>

              <?php
                foreach ($r_prepared as $item){
                $lien3 = "lien vers la reservation"/*site_url("Product/product_page/$item->CodeProduit")*/;
              ?>

              <tr class="success">
                <td class="text-center"><?php echo $item->NumLigneRes; ?></td>
                <td class="text-center"><?php echo $item->LibelleProduit; ?></td>
                <td class="text-center"><?php echo $item->StatusLigneRes; ?></td>
                <td class="text-center"><?php echo $item->DateReservation; ?></td>
                <td class="text-center"><?php echo $item->DateFinRes; ?></td>
                <td class="text-center"><?php echo $item->QteLigneRes; ?></td>
                <td class="text-center">
                  <a href="<?php echo $lien3 ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                </td>
              </tr>

              <?php } ?>

                <?php
                  foreach ($r_expire as $item){
                  $lien4 = "lien vers la reservation"/*site_url("Product/product_page/$item->CodeProduit")*/;
                ?>

                <tr class="danger">
                  <td class="text-center"><?php echo $item->NumLigneRes; ?></td>
                  <td class="text-center"><?php echo $item->LibelleProduit; ?></td>
                  <td class="text-center"><?php echo $item->StatusLigneRes; ?></td>
                  <td class="text-center"><?php echo $item->DateReservation; ?></td>
                  <td class="text-center"><?php echo $item->DateFinRes; ?></td>
                  <td class="text-center"><?php echo $item->QteLigneRes; ?></td>
                  <td class="text-center">
                    <a href="<?php echo $lien4 ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>

        </div>

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
