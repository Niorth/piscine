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
          Utilisez le formulaire ci-dessous pour modifier le mot de passe de votre compte<br>
        </p>

        <form action="<?php echo site_url("Product/update_product") ?>" method="post" id="checkout-form" class="form-horizontal" >

          <div class="form-group">
            <label class="control-label col-sm-4">Mot de passe actuel:</label>
            <div class="col-sm-8">
              <input class="input" type="password" name="currentpw"  required>
            </div>
          </div>

          <p>Votre mot de passe doit contenir au moins 8 caracteres dont au moins un chiffre et une majuscule.</p>

          <div class="form-group">
            <label class="control-label col-sm-4">Nouveau mot de passe:</label>
            <div class="col-sm-8">
              <input class="input" type="password" name="newpw"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Votre mot de passe doit contenir au moins 8 caracteres dont au moins un chiffre et une majuscule." required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4">Ressaisir le nouveau mot de passe:</label>
            <div class="col-sm-8">
              <input class="input" type="password" name="checkpw"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Votre mot de passe doit contenir au moins 8 caracteres dont au moins un chiffre et une majuscule." required>
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
