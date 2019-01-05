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

          <div class="product-body" id="productBodyCard">
              <input id="productCode" type="hidden" value="<?php echo $product[0]->CodeProduit; ?>">
            <h2 class="product-name"><?php echo $product[0]->LibelleProduit; ?></h2>
            <h3 class="product-price"><?php echo $product[0]->PrixProd . "€"; ?></h3>
            <div>
              <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i>
              </div>
              <a href="#">3 Commentaire / Ajouter Commentaire</a>
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

            <!-- A faire  -->

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
                  <input class="input" type="number" min="1" max="<?php echo $product[0]->StockDispo; ?>" value="1">
                </div>
                  <br>
                  <br>
                <button class="primary-btn add-to-cart" id="booking"><i class="fa fa-shopping-cart"></i> Ajouter aux réservations</button>
                <button class="primary-btn add-to-cart" id="delivery"><i class="fa fa-truck"></i> Ajouter aux Commandes</button>

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


                      <div class="single-review">
                        <div class="review-heading">
                          <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                          <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                          <div class="review-rating pull-right">

                          </div>
                        </div>
                        <div class="review-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                      </div>

                      <ul class="reviews-pages">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h4 class="text-uppercase">Write Your Review</h4>
                    <p>Your email address will not be published.</p>
                    <form class="review-form">
                      <div class="form-group">
                        <input class="input" type="text" placeholder="Your Name" />
                      </div>
                      <div class="form-group">
                        <input class="input" type="email" placeholder="Email Address" />
                      </div>
                      <div class="form-group">
                        <textarea class="input" placeholder="Your review"></textarea>
                      </div>
                      <div class="form-group">
                        <div class="input-rating">
                          <strong class="text-uppercase">Your Rating: </strong>
                          <div class="stars">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                          </div>
                        </div>
                      </div>
                      <button class="primary-btn">Submit</button>
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
<script type = "module" src = "<?php echo base_url(); ?>js/product_page.js"></script>
<!-- /section -->
