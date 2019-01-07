<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">

        <div class="section-title">
          <h3 class="title">Autres paramètres</h3>
        </div>

        <form action="<?php echo site_url("Trader/change_shop") ?>" method="post" class="form-horizontal">

          <div class="form-group">
            <label class="control-label col-sm-2">Boutique courant:</label>
            <div class="col-sm-2">
              <select  name= "boutique" class="standardSelect" tabindex="1">
                <?php
                  foreach ($boutique as $item) {
                     $selected = "";
                      if ($item->IdBoutique == $idCourant) {
                             $selected = "selected";
                      }?>
                    <option  <?php echo $selected; ?> value ="<?php echo $item->IdBoutique; ?>"><?php echo $item->NomBoutique;?></option>
                 <?php } ?>
               </select>
            </div>
            <div class="col-sm-2">
              <input type="submit" class="btn btn-success" value="Valider">
            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </form>

        <form action="<?php echo site_url("Trader/change_shop") ?>" method="post" class="form-horizontal">

          <div class="form-group">
            <label class="control-label col-sm-2">Entrez un code:</label>
            <div class="col-sm-2">
              <input class="form-control" type="text" name="code" placeholder="Code" required>
            </div>
            <div class="col-sm-2">
              <input type="submit" class="btn btn-success" value="Valider">
            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </form>

      </div>

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
