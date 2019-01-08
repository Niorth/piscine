<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="panel panel-default">

        <div class="panel-body">

            <div class="col-md-12">
              <div class="col-md-4"></div>
              <h1 class="col-md-4 text-center"><?php echo $boutique[0]->NomBoutique ?></h1>
              <div class="col-md-4 text-right">
                <?php if(isset($_SESSION['login']) && $_SESSION['privilege']!=1) { ?>
                <a href="<?php $id =  $boutique[0]->IdBoutique; echo site_url("Shop/modify_shop_page/$id"); ?>" class="btn btn-warning" role="button">Modifier</a>
                <?php } ?>
              </div>
            </div>


            <p class="col-md-12" style="font-size: 15px;">
              <br><strong>Adresse : </strong><br>
              <?php echo $boutique[0]->RueBoutique ?>
              <br><?php echo $boutique[0]->VilleBoutique ?>
              <br> <?php echo $boutique[0]->CPBoutique ?>
              <br><strong>N° Téléphone :</strong> <br>
              <?php echo $boutique[0]->TelBoutique ?>
              <br><strong>E-mail : </strong>
              <br><?php echo $boutique[0]->MailBoutique ?>
              <br><strong>Horaires d'ouverture:</strong>
              <br><?php echo $boutique[0]->HorairesBoutique ?>
            </p>

            <!-- row -->
      			<div class="row">
      				<!-- section title -->
      				<div class="col-md-12">
      					<div class="section-title">
      						<h2 class="title">Les derniers produits du magasin</h2>
      					</div>
      				</div>
      				<!-- section title -->

      				<!-- Product Single -->

              <?php
                $k = count($product);
                for($i=0; $i <$k; $i++){
                $code = $product[$i]->CodeProduit;
                $lien = site_url("Product/product_page/$code");
                $link = $product[$i]->ImgProd;
                ?>

      				<div class="col-md-3 col-sm-6 col-xs-6">
      					<div class="product product-single">
      						<div class="product-thumb">
      							<a href="<?php echo $lien ?>"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i>Détail</button></a>
      							<img src="<?php echo base_url() . "assets/img/" . $link ?>" alt="">
      						</div>

      						<div class="product-body">
      							<h3 class="product-price"><?php if (isset($product[$i])) echo $product[$i]->PrixProd;?> €</h3>

                    <?php  if ($review_stats[$i][0]->nbAvis != 0) { ?>
      							<div class="product-rating">
                      <?php
                        $n = intval($review_stats[$i][0]->moyenne);
                        for ($j = 0; $j < $n; $j++){
                      ?>
      								<i class="fa fa-star"></i>
                      <?php };
                      for ($j = $n ; $j < 5; $j++){
                      ?>
                      <i class="fa fa-star-o empty"></i>
                      <?php }; ?>
        							</div>
                      <?php } ?>

      							<h2 class="product-name"><a href="<?php echo $lien ?>"><?php if (isset($product[$i])) echo $product[$i]->LibelleProduit;?></a></h2>
      							<div class="product-btns">
                      <?php
                        if ($product[$i]->StockDispo != 0){ ?>
                          <a href="<?php echo $lien ?>"><button class="primary-btn add-to-cart">Commander</button></a>
                          <a href="<?php echo $lien ?>"><button class="primary-btn add-to-cart">Reserver</button></a>
                      <?php } ?>
      							</div>
      						</div>
      					</div>
      				</div>

              <?php } ?>
      				<!-- /Product Single -->

      			</div>
      			<!-- /row -->

        </div>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
