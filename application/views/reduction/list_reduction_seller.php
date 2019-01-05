<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->

    <div class="row">

      <div class="col-md-12">

        <div class="section-title">
          <h3 class="title">Mes Réductions</h3>
        </div>

        <div class="col-md-8"></div>
        <div class="col-md-4">
          <p>Ajouter un bon de réduction: <a href="<?php echo site_url("Reduction/create_reduction_page") ?>" class="btn btn-primary" role="button">Ajouter</a></p>
        </div>

        <?php
          foreach ($reduction as $item) {
          $num = $item->NumReduction;
        ?>

        <div class="well col-md-3">
            <div class="col-md-12 text-center">Code: <strong><?php echo $item->CodeReduction ?></strong></div>
            <div class="col-md-12 text-center"><?php echo $item->LibelleReduction ?> </div>
            <div class="col-md-12 text-center">Montant: <?php echo $item->MontantReduction ?> €</div>
            <div class="col-md-12 text-center">valable du <?php echo date( 'd-m-Y', strtotime($reduction[0]->DateDReduction)) ?> au <?php echo date( 'd-m-Y', strtotime($reduction[0]->DateFReduction)) ?></div>
            <div class="col-md-6">
              <a href="<?php echo site_url("Reduction/update_reduction_page/$num") ?>" class="btn btn-warning" role="button">Modifier</a>
            </div>
            <div class="col-md-6">
              <a href="<?php echo site_url("Reduction/delete_reduction/$num") ?>" class="btn btn-danger" role="button">Supprimer</a>
            </div>
        </div>

        <div class="col-md-1"></div>

      <?php } ?>

      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
