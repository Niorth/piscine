<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->

    <div class="row">

      <div class="col-md-8">

          <div class="section-title">
            <h3 class="title">
              <?php
                if (isset($reduction)){
                  echo $reduction[0]->LibelleReduction;
                }else{
                   echo "Créer un bon de réduction";
                }
               ?>
            </h3>
          </div>

          <form action="<?php echo site_url("Reduction/$action") ?>" method="post" id="checkout-form" class="form-horizontal" >

          <input name="NumReduction" type="hidden" <?php if (isset($reduction)) echo "value = \"" .  $reduction[0]->NumReduction . "\""?>>

          <div class="form-group">
            <label class="control-label col-sm-4">Nom du bon: </label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="LibelleReduction" placeholder="Nom" required <?php if (isset($reduction)) echo "value = \"" . $reduction[0]->LibelleReduction . "\""?>>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4">Code du bon: </label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="CodeReduction" placeholder="code" required <?php if (isset($reduction)) echo "value = \"" . $reduction[0]->CodeReduction. "\""?>>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4">Montant de reduction :</label>
            <div class="col-sm-8">
              <input class="form-control" type="number" name="MontantReduction" placeholder="Prix" step="5" min="0" <?php if (isset($reduction)) echo "value = \"" . $reduction[0]->MontantReduction . "\""?> required >
            </div>
          </div>

            <div class="form-group">
                <label class="control-label col-sm-4">Date début reduction</label>
                <div class="col-sm-8">
                  <input type="date" name="DateDReduction" required min="<?php echo date("Y-m-d H:i:s") ?>" <?php if (isset($reduction)) echo "value = \"" . date( 'd-m-Y', strtotime($reduction[0]->DateDReduction)) . "\""?>><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4">Date fin reduction</label>
                <div class="col-sm-8">
                  <input type="date" name="DateFReduction" required min="<?php echo date("Y-m-d H:i:s") ?>" <?php if (isset($reduction)) echo "value = \"" . $reduction[0]->DateFReduction. "\""?>><br>
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
