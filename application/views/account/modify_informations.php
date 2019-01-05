<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-8">
        <div class="section-title">
          <h3 class="title">Modifier mes informations</h3>
        </div>

        <p>
          Utilisez le formulaire ci-dessous pour modifier les informations de votre compte.<br>
          Ses informations seront utilisées pour passer une commande
        </p>

        <form action="<?php echo site_url("Account/update_info") ?>" method="post" id="checkout-form" class="form-horizontal" >
          <div class="form-group">
            <label class="control-label col-sm-2">Nom :</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="Nom" placeholder="Nom" <?php if (isset($info)) echo "value = \"" .  $info['name'] . "\""?> required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Prenom :</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="Prenom" placeholder="Prenom" <?php if (isset($info)) echo "value = \"" .  $info['firstName'] . "\""?> required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Adresse :</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="Rue" placeholder="Rue" <?php if (isset($info)) echo "value = \"" .  $info['street'] . "\""?> required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Ville :</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="Ville" placeholder="Ville" <?php if (isset($info)) echo "value = \"" .  $info['city'] . "\""?> required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Code Postal :</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="CP" placeholder="Code Postal" <?php if (isset($info)) echo "value = \"" .  $info['postalCode'] . "\""?> required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Numero de Tél :</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="Tel" placeholder="Num Tel" <?php if (isset($info)) echo "value = \"" .  $info['phone'] . "\""?> required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="primary-btn" value="Valider">
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
