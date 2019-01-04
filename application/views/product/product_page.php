<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!--  Product Details -->
      <div class="product product-details clearfix">
        <div class="col-md-6">


          <div id="product-main-view">
            <div class="product-view">
              <?php $link = $product[0]->ImgProd ?>
              <img src="<?php echo base_url() . "assets/img/" . $link ?>" alt="" >
            </div>
          </div>


          <!-- div id="product-view">
            <div class="product-view">
              <img src="./img/thumb-product01.jpg" alt="">
            </div>
            <div class="product-view">
              <img src="./img/thumb-product02.jpg" alt="">
            </div>
            <div class="product-view">
              <img src="./img/thumb-product03.jpg" alt="">
            </div>
            <div class="product-view">
              <img src="./img/thumb-product04.jpg" alt="">
            </div>
          </div -->
        </div>


        <div class="col-md-6">

          <!-- A afficher qu'en mode admin et commercant -->

          <a href="<?php $code = $product[0]->CodeProduit; echo site_url("Product/update_product_page/$code"); ?>" class="btn btn-warning" role="button">Modifier</a>
          <a href="<?php $code = $product[0]->CodeProduit; echo site_url("Product/delete_product/$code"); ?>" class="btn btn-danger" role="button">Supprimer</a>

          <!-- fin commentaire -->

          <div class="product-body">
            <h2 class="product-name"><?php echo $product[0]->LibelleProduit; ?></h2>
            <h3 class="product-price"><?php echo $product[0]->PrixProd . " €"; ?></h3>
            <div>

              <div class="product-rating">
                <?php
                  $n = intval($review_stats[0]->moyenne);
                  for ($i = 0; $i < $n; $i++){
                ?>
                <i class="fa fa-star"></i>
                <?php };
                for ($i = $n ; $i < 5; $i++){
                ?>
                <i class="fa fa-star-o empty"></i>
                <?php }; ?>
              </div>
              <a href="#"><?php echo $review_stats[0]->nbAvis; ?> Commentaires / Ajouter un Commentaire</a>
            </div>

            <p><strong>Disponibilité:</strong>
              <?php if ($product[0]->StockDispo == 0){ ?>
                Non Disponible
              <?php } else{ ?>
                Disponible
              <?php } ?>
            </p>
            <p><strong>Vendeur:</strong> <?php echo $boutique[0]->NomBoutique; ?> </p>
            <p><?php echo $product[0]->DescriptionProd; ?></p>

            <!-- A faire Variante -->

            <!-- <div class="product-options">
              <ul class="size-option">
                <li><span class="text-uppercase">Size:</span></li>
                <li class="active"><a href="#">S</a></li>
                <li><a href="#">XL</a></li>
                <li><a href="#">SL</a></li>
              </ul>
              <ul class="color-option">
                <li><span class="text-uppercase">Color:</span></li>
                <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                <li><a href="#" style="background-color:#8A2454;"></a></li>
                <li><a href="#" style="background-color:#BF6989;"></a></li>
                <li><a href="#" style="background-color:#9A54D8;"></a></li>
              </ul>
            </div> -->

            <?php if ($product[0]->StockDispo != 0){ ?>

              <div class="product-btns">
                <div class="qty-input" >
                  <span class="text-uppercase">Quantité: </span>
                  <input class="input" type="number" min="1" max="<?php echo $product[0]->StockDispo; ?>">
                </div>
                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>

                <!--
                <div class="qty-input">
                  <span class="text-uppercase">Quantité: </span>
                  <input class="input" type="number">
                </div>
                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Reserver</button>


                <div class="pull-right">
                  <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                  <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                  <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                </div>
                -->

              </div>

            <?php } ?>

          </div>
        </div>
        <div class="col-md-12">
          <div class="product-tab">
            <ul class="tab-nav">
              <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
              <li><a data-toggle="tab" href="#tab1">Details</a></li>
              <li><a data-toggle="tab" href="#tab2">Commentaire</a></li>
            </ul>
            <div class="tab-content">
              <div id="tab1" class="tab-pane fade in active">
                <p><?php echo $product[0]->DescriptionProd ?></p>
              </div>
              <div id="tab2" class="tab-pane fade in">

                <div class="row">
                  <div class="col-md-6">
                    <div class="product-reviews">

                      <?php
                        foreach ($all_review as $item){
                      ?>

                      <div class="single-review">
                        <div class="review-heading">
                          <div><a href="#"><i class="fa fa-user-o"></i> <?php echo $item->NomClient ." ". $item->PrenomClient ?></a></div>
                          <!--
                          <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                          -->
                          <div><a href="#"><i class="fa fa-clock-o"></i> <?php echo $item->DateAvis ?> </a></div>
                          <div class="review-rating pull-right">
                            <?php
                              $n = intval($item->NoteAvis);
                              for ($j = 0; $j < $n; $j++){
                            ?>
                            <i class="fa fa-star"></i>
                            <?php };
                            for ($j = $n ; $j < 5; $j++){
                            ?>
                            <i class="fa fa-star-o empty"></i>
                            <?php }; ?>

                          </div>
                        </div>
                        <div class="review-body">
                          <p><?php echo $item->Commentaire ?></p>
                        </div>
                      </div>
                      <?php } ?>

                      <ul class="reviews-pages">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                      </ul>

                    </div>

                  </div>
                  <div class="col-md-6">
                    <h4 class="text-uppercase">Décrivez votre expérience</h4>

                    <form class="review-form" method="post" action="<?php echo site_url("Product/add_review") ?>" >
                      <input name="CodeProduit" type="hidden" <?php if (isset($product)) echo "value = \"" .  $product[0]->CodeProduit. "\""?>>
                      <div class="form-group">
                        <textarea class="input" name="commentaire" rows="20" required placeholder="Qu'est ce que vous avez aimé ou n'avez pas aimé ?"></textarea>
                      </div>
                      <div class="form-group">
                        <div class="input-rating">
                          <strong class="text-uppercase">Evaluation: </strong>
                          <div class="stars">
                            <input type="radio" id="star5" name="note" value="5" required /><label for="star5"></label>
                            <input type="radio" id="star4" name="note" value="4" required /><label for="star4"></label>
                            <input type="radio" id="star3" name="note" value="3" required /><label for="star3"></label>
                            <input type="radio" id="star2" name="note" value="2" required /><label for="star2"></label>
                            <input type="radio" id="star1" name="note" value="1" required /><label for="star1"></label>
                          </div>
                        </div>
                      </div>
                      <button class="primary-btn">Envoyer</button>
                    </form>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /Product Details -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
