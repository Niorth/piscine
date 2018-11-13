
<!--
 * Created by PhpStorm.
 * User: Hugo
 * Date: 01/11/2018
 * Time: 17:22
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
              <h3 class="title">Connexion</h3>
            </div>

              <div class="form-group">
                  <label class=" form-control-label">E-mail:</label>
                  <input class="input" type="email" name="mail" placeholder="Email" required>
              </div>
              <div class="form-group">
                  <label class=" form-control-label">Mot de passe :</label>
                  <input class="input" type="password" name="pw" placeholder="Mot de passe" required>
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
