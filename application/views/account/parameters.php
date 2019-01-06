<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">

        <div class="section-title">
          <h3 class="title">Mes paramètres</h3>
        </div>

        <div class="col-md-8">


          <ul class="list-group">

            <li class="list-group-item">
              <div class="row">
                <p class="col-md-10"><strong>Mes informations</strong></p>
                <div class="col-md-2">
                    <a href="<?php echo site_url("Account/modify_informations_page") ?>" class="btn btn-warning" role="button">Modifier</a>
                </div>
                <p class="col-md-12"><strong>Nom:</strong><br>
                   <?php echo $info['name'] ?>
                </p>
                <p class="col-md-12"><strong>Prenom:</strong><br>
                  <?php echo $info['firstName'] ?>
                </p>
                <p class="col-md-12"><strong>Adresse:</strong><br>
                  <?php echo $info['street'] ?><br>
                  <?php echo $info['city'] ?><br>
                  <?php echo $info['postalCode'] ?>
                </p>
                <p class="col-md-12"><strong>Numéro de Téléphone:</strong><br>
                  <?php echo $info['phone'] ?>
                </p>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <p class="col-md-10"><strong>Mot de passe:</strong><br>
                  **********
                </p>
                <div class="col-md-2">
                    <a href="<?php echo site_url("Account/modify_password_page") ?>" class="btn btn-warning" role="button">Modifier</a>
                </div>

              </div>
            </li>

          </ul>
        </div>

      </div>

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
