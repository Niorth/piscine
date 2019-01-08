<style>


/* Float four columns side by side */
.column1 {
  float: left;
  width: 25%;
  padding: 0 5px;
}

.row1 {margin: 0 -5px;}

/* Clear floats after the columns */
.row1:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column1 {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #444;
  color: white;
}

.fa1 {font-size:50px;}
</style>


<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-6">
          <div class="section-title">
            <h3 class="title">Etat de mes commandes:</h3>
          </div>

          <div class="row1">
            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-truck" style="font-size:50px;"></i></p>
                <h3 style="color: white;"><?php echo $totalLigneCommande[0]->total; ?></h3>
                <p>Total</p>
              </div>
            </div>

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-smile-o" style="font-size:50px;"></i></p>
                <h3 style="color: white;"><?php echo $totalLigneCommandeTraite[0]->total; ?></h3>
                <p>Livré</p>
              </div>
            </div>

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-spinner" style="font-size:50px;"></i></p>
                <h3 style="color: white;"><?php echo $totalLigneCommandeCours[0]->total; ?></h3>
                <p>En cours</p>
              </div>
            </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="section-title">
            <h3 class="title">Etat de mes Stock:</h3>
          </div>

          <div class="row1">
            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-gift" style="font-size:50px;"></i></p>
                <h3 style="color: white;"><?php echo $totalStock[0]->total; ?></h3>
                <p>Total</p>
              </div>
            </div>

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-times" style="font-size:50px;"></i></p>
                <h3 style="color: white;"><?php echo $totalStockRupture[0]->total; ?></h3>
                <p>Rupture</p>
              </div>
            </div>

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-check" style="font-size:50px;"></i></p>
                <h3 style="color: white;"><?php echo $totalStockDispo[0]->total; ?></h3>
                <p>Disponible</p>
              </div>
            </div>

          </div>

      </div>

    </div>
    <!-- /row -->

    <div class="row">
      <br>
      <br>
    </div>

    <!-- row -->
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
          <div class="section-title">
            <h3 class="title">Etat de mes reservation:</h3>
          </div>

          <div class="row1 text-center">

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-shopping-cart" style="font-size:50px;"></i></p>
                <h3 style="color: white;">11+</h3>
                <p>Total</p>
              </div>
            </div>

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-smile-o" style="font-size:50px;"></i></p>
                <h3 style="color: white;">11+</h3>
                <p>Retiré</p>
              </div>
            </div>

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-spinner" style="font-size:50px;"></i></p>
                <h3 style="color: white;">11+</h3>
                <p>En cours</p>
              </div>
            </div>

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-times" style="font-size:50px;"></i></p>
                <h3 style="color: white;">11+</h3>
                <p>Expiré</p>
              </div>
            </div>

          </div>

      </div>
      <div class="col-md-2"></div>

    </div>
    <!-- /row -->

  </div>
  <!-- /container -->
</div>
<!-- /section -->
