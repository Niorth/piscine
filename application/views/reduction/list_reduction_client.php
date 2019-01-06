<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->

    <div class="row">

      <div class="col-md-12">

        <div class="section-title">
          <h3 class="title">Liste des Réductions</h3>
        </div>


        <?php
          foreach ($reduction as $item) {
          $num = $item->NumReduction;
        ?>

        <div class="well col-md-3">
            <div class="col-md-12 text-center"><h3><?php echo $item->CodeReduction ?></h3></div>
            <div class="col-md-12 text-center">
              <p><?php echo $item->MontantReduction ?> € de réduction chez <strong><?php echo $item->NomBoutique ?></strong> avec ce code promo<p>
            </div>
            <div class="col-md-12 text-center">*valable du <?php echo date( 'd-m-Y', strtotime($reduction[0]->DateDReduction)) ?> au <?php echo date( 'd-m-Y', strtotime($reduction[0]->DateFReduction)) ?></div>
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
