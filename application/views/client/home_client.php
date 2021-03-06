<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">


      <div class="col-md-12">

        <div class="section-title">
          <h3 class="title">Espace Client</h3>
        </div>

        <p>Bienvenue sur votre espace client</p>

          <div class="row">
             <div class="col-xs-4">
               <a href="<?php echo site_url("Customer/all_order_page") ?>" class="btn btn-default  btn-lg btn-block">
                 <img src="<?php echo base_url() . "assets/img/box_icon"?>" alt="mes commandes" height="100" width="100" >
                 <strong>Mes Commandes</strong>
               </a>
             </div>
             <div class="col-xs-4">
               <a href="<?php echo site_url("Account/parameters_page") ?>" class="btn btn-default  btn-lg btn-block">
                 <img src="<?php echo base_url() . "assets/img/parameter_icon"?>" alt="mes parametres" height="100" width="100" >
                 <strong>Mes Paramètres</strong>
               </a>
             </div>
             <div class="col-xs-4">
               <a href="<?php echo site_url("Customer/all_reservation_page") ?>" class="btn btn-default  btn-lg btn-block">
                 <img src="<?php echo base_url() . "assets/img/reservation_icon"?>" alt="mes reservations" height="100" width="100">
                 <strong>Mes Reservations</strong>
               </a>
             </div>
          </div>

      </div>

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
