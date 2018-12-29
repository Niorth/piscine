<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">
          <div class="section-title">
            <h3 class="title">Etat de mes commandes:</h3>
          </div>

          <ul>
            <div class="col-md-6">
              <li>Total : <span class="badge badge-primary badge-pill"><?php echo $totalLigneCommande[0]->total ?></span>
                <div class="col-md-12">
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Traité : <span class="badge badge-primary badge-pill"><?php echo $totalLigneCommandeTraite[0]->total ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Non Traité : <span class="badge badge-primary badge-pill"><?php echo $totalLigneCommandeNonTraite[0]->total ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      En cours de préparation : <span class="badge badge-primary badge-pill"><?php echo $totalLigneCommandeCours[0]->total ?></span>
                    </li>
                  </ul>
                </div>
              </li>
            </div>
          </ul>

      </div>

    </div>
    <!-- /row -->

    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <div class="billing-details">
          <div class="section-title">
            <h3 class="title">Etat de mes Reservations:</h3>
          </div>

          <ul>
            <div class="col-md-6">
              <li>Total : <span class="badge badge-primary badge-pill">4</span>
                <div class="col-md-12">
                  <ul style="list-style-type:circle">
                    <li>
                      Traité : <span class="badge badge-primary badge-pill">12</span>
                    </li>
                    <li>
                      Payé : <span class="badge badge-primary badge-pill">12</span>
                      <ul style="list-style-type:disc">
                        <li>
                          Non traité : <span class="badge badge-primary badge-pill">12</span>
                        </li>
                        <li>
                          En cours de préparation : <span class="badge badge-primary badge-pill">12</span>
                        </li>
                      </ul>
                    </li>
                    <li>
                      Non Payé : <span class="badge badge-primary badge-pill">12</span>
                    </li>
                    <li>
                      Date dépassé : <span class="badge badge-primary badge-pill">12</span>
                    </li>
                  </ul>
                </div>
              </li>
            </div>
          </ul>


        </div>
      </div>
    </div>
    <!-- /row -->

  </div>
  <!-- /container -->
</div>
<!-- /section -->
