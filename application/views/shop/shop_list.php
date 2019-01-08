<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">


      <div class="col-md-6">

          <div class="section-title">
            <h3 class="title">Liste des boutiques</h3>
          </div>

          <?php
              foreach($shop as $item){
              $id = $item->IdBoutique;
              $lien = site_url("Shop/Shop_card/$id");

          ?>
          <ul style="list-style-type:square">
            <a href="<?php echo $lien ?>" ><li><?php echo $item->NomBoutique ?></li>
          </ul>
              <?php  } ?>
      </div>

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
