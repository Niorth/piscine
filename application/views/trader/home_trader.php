<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">

        <div class="section-title">
          <h3 class="title">Espace Commercant</h3>
        </div>

        <p>Bienvenue sur votre espace commercant</p>

          <div class="row">
             <div class="col-xs-4">
               <a href="<?php echo site_url("Account/parameters_page") ?>" class="btn btn-default  btn-lg btn-block">
                 <img src="<?php echo base_url() . "assets/img/parameter_icon"?>" alt="mes parametres" height="100" width="100" >
                 <strong>Mes Paramètres</strong>
               </a>
             </div>
             <div class="col-xs-4">
               <a href="<?php echo site_url("Shop/shop_card/$idBoutique") ?>" class="btn btn-default  btn-lg btn-block">
                 <img src="<?php echo base_url() . "assets/img/shop_icon"?>" alt="ma boutique" height="100" width="100">
                 <strong>Ma boutique</strong>
               </a>
             </div>
             <div class="col-xs-4">
               <a href="<?php echo site_url("Trader/other_option_page") ?>" class="btn btn-default  btn-lg btn-block">
                 <img src="<?php echo base_url() . "assets/img/dots_icon"?>" alt="autres" height="100" width="100">
                 <strong>Autres</strong>
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
