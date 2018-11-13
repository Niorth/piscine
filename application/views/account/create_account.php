<!--
 * Created by PhpStorm.
 * User: Hugo
 * Date: 31/10/2018
 * Time: 18:31
 -->

<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <form action="<?php echo site_url("Account/$action") ?>" method="post" id="checkout-form" class="clearfix" >

        <div class="col-md-6">
          <div class="billing-details">
            <div class="section-title">
              <h3 class="title">Créer un compte</h3>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Nom :</label>
              <input class="input" type="text" name="nom" placeholder="Nom" required>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Prénom :</label>
              <input class="input" type="text" name="prenom" placeholder="Prénom" required>
            </div>
              <div class="form-group">
                  <label class=" form-control-label">E-mail:</label>
                  <input class="input" type="email" name="mail" placeholder="Email" required>
              </div>
              <div class="form-group">
                  <label class="form-control-label">Vous etes un :</label><br>
                  <input type="radio" name="type" value=client required checked> Client<br>
                  <input type="radio" name="type" value=commercant> Commercant<br>
              </div>
              <div class="form-group">
                  <label class=" form-control-label">Mot de passe :</label>
                  <input class="input" type="password" name="pw" placeholder="Mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Votre mot de passe doit contenir au moins 8 caracteres dont au moins un chiffre et une majuscule." required>
              </div>
            <div class="form-group">
              <label class=" form-control-label">Adresse :</label>
              <input class="input" type="text" name="rue" placeholder="Rue" required>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Ville :</label>
              <input class="input" type="text" name="ville" placeholder="Ville" required>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Code postal :</label>
              <input class="input" type="text" name="cp" placeholder="Code postal" required>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Numero de téléphone</label>
              <input class="input" type="tel" name="tel" placeholder="Numéro de Tel" >
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
