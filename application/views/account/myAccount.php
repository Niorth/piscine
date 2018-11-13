<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 12/11/2018
 * Time: 09:47
 */
?>
<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
              <div class="row">
                  <div class="col-md-6">
                      <div class="billing-details">
                         <div class="section-title">
                             <h3>MON COMPTE</h3>
                         </div>
                          <?php
                          echo('<li>Nom : ' . $info['name'] . '<button type="button">Modifier</button> </li>');
                          echo('<li>Prénom : ' . $info['firstName'] . '<button type="button">Modifier</button> </li>');
                          echo('<li>Adresse : ' . $info['street'] . ', ' . $info['city'] . ', ' . $info['postalCode'] . '<button type="button">Modifier</button> </li>');
                          echo('<li>E-mail : ' . $info['mail'] . '<button type="button">Modifier</button> </li>');
                          echo('<li>Numéro de téléphone : ' . $info['phone'] . '<button type="button">Modifier</button> </li>');
                          echo('<li>Mot de passe : ******<button type="button">Modifier</button> </li>');
                          ?>
                      </div>
                </div>
              </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
