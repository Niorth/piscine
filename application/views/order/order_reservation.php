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



          <table class="table table-hover table-bordered" id="table" data-filter-control="true" data-filter-show-clear="true">
            <thead>
              <tr>
                <th class="text-center">Commande N°</th>
                <th class="text-center" data-filter-control="input">
                  Nom du Produit
                </th>
                <th class="text-center" data-filter-control="select" >Status</th>
                <th class="text-center" data-filter-control="select">Date commande</th>
                <th class="text-center">Quantité</th>
                <th class="text-center">Details</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($c_nontraite as $item){
                $numLigneC = $item->NumLigneCommande;
                $numC = $item->NumCommande;
                $lien = site_url("Order/order_detail_seller/$numLigneC/$numC");
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
                  $numLigneC = $item->NumLigneCommande;
                  $numC = $item->NumCommande;
                  $lien1 = site_url("Order/order_detail_seller/$numLigneC/$numC");
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

      <br>

    <!-- row -->
    <div class="row">

        <div class="col-md-12">

          <div class="section-title col-md-4">
            <h3 class="title">Mes Reservations</h3>
          </div>

          <div class="col-md-4"></div>
          <div class="col-md-4">
            <p>Supprimer les reservations expirées : <a href="<?php echo site_url('Reservation/delete_reservation_expired'); ?>" class="btn btn-danger" role="button">Supprimer</a> </p>
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
                  <th class="text-center">Details</th>
                </tr>

              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($r_notPrepared as $item){
                  $numLigneR = $item->NumLigneRes;
                  $numR = $item->NumReservation;
                  $lien2 = site_url("Reservation/reservation_detail_seller/$numLigneR/$numR");
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
                  $numLigneR = $item->NumLigneRes;
                  $numR = $item->NumReservation;
                  $lien3 = site_url("Reservation/reservation_detail_seller/$numLigneR/$numR");
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
                    $numLigneR = $item->NumLigneRes;
                    $numR = $item->NumReservation;
                    $lien4 = site_url("Reservation/reservation_detail_seller/$numLigneR/$numR");
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

<script>
  function mounted() {
    $('#table').bootstrapTable()
  }
</script>
