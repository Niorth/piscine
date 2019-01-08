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

      <div class="col-md-12">
          <div class="section-title">
            <h3 class="title">Etat de mes commandes:</h3>
          </div>

          <div class="row1">

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-user" style="font-size:50px;"></i></p>
                <h3 style="color: white;">11+</h3>
                <p>Total</p>
              </div>
            </div>

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-user" style="font-size:50px;"></i></p>
                <h3 style="color: white;">11+</h3>
                <p>Non livré</p>
              </div>
            </div>

            <div class="column1">
              <div class="card1">
                <p><i class="fa fa-user" style="font-size:50px;"></i></p>
                <h3 style="color: white;">11+</h3>
                <p>Non livré</p>
              </div>
            </div>

          </div>

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
