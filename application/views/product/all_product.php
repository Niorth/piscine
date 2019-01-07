<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- ASIDE -->
      <div id="aside" class="col-md-3">
        <!-- aside widget -->
        <div class="aside">
          <h3 class="aside-title">Filtrer par:</h3>
          <ul class="filter-list">

          </ul>


          <button class="primary-btn">Reinitialiser</button>
        </div>
        <!-- /aside widget -->

        <!-- aside widget -->
        <div class="aside">
          <h3 class="aside-title">Filtrer par prix</h3>
          <div id="price-slider"></div>
        </div>
        <!-- aside widget -->

      </div>
      <!-- /ASIDE -->

      <!-- MAIN -->
      <div id="main" class="col-md-9">
        <!-- store top filter -->
        <div class="store-filter clearfix">
          <div class="pull-left">
            <div class="row-filter">
              <a href="#"><i class="fa fa-th-large"></i></a>
              <a href="#" class="active"><i class="fa fa-bars"></i></a>
            </div>
            <div class="sort-filter">
              <span class="text-uppercase">Filtrer par:</span>
              <select class="input">
                  <option value="0">Position</option>
                  <option value="0">Prix</option>
                  <option value="0">Evaluation</option>
                </select>
              <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
            </div>
          </div>
          <div class="pull-right">
            <div class="page-filter">
              <span class="text-uppercase">Afficher:</span>
              <select class="input">
                  <option value="0">10</option>
                  <option value="1">20</option>
                  <option value="2">30</option>
                </select>
            </div>
            <ul class="store-pages">
              <li><span class="text-uppercase">Page:</span></li>
              <li class="active">1</li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- /store top filter -->

        <!-- STORE -->
        <div id="store">
          <!-- row -->
          <div class="row">

            <table class="shopping-cart-table table table-hover">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Nom Produit / Vendeur / evaluation</th>
                  <th>Disponibilité</th>
                  <th>Prix</th>
                  <th>Ajouter au panier</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $k = count($product);
                  for($i=0; $i <$k; $i++){
                  $code = $product[$i]->CodeProduit;
                  $lien = site_url("Product/product_page/$code");
                  $link = $product[$i]->ImgProd;
                  ?>

                  <tr>
                    <td class="thumb">
                      <img src="<?php echo base_url() . "assets/img/" . $link ?>" alt="<?php echo $product[$i]->LibelleProduit ?>" >
                    </td>

                    <td class="details">
                        <a href="<?php echo $lien ?>"><?php if (isset($product[$i])) echo $product[$i]->LibelleProduit;?></a>
                        <ul>
                          <li><?php  if (isset($product[$i])) echo $product[$i]->NomBoutique; ?></li>
                          <li>

                            <?php  if ($review_stats[$i][0]->nbAvis != 0) { ?>
                            <div class="product-body">
                              <div class="product-rating">
                                <?php
                                  $n = intval($review_stats[$i][0]->moyenne);
                                  for ($j = 0; $j < $n; $j++){
                                ?>
                                <i class="fa fa-star" style="color:#FFB656"></i>
                                <?php };
                                for ($j = $n ; $j < 5; $j++){
                                ?>
                                <i class="fa fa-star-o empty"></i>
                                <?php }; ?>
        										  </div>
                            </div>

                            <?php } ?>

                          </li>
                        </ul>
                    </td>

                    <td class="etatstock text-center">
                      <?php
                        $stockMsg = "EN STOCK";
                        if ($product[$i]->StockDispo == 0){ $stockMsg = "RUPTURE";}
                      ?>
                      <strong><?php echo $stockMsg; ?></strong>
                    </td>

                    <td class="price text-center"><?php echo $product[$i]->PrixProd; ?> €</td>


                    <td  class="text-center">
                      <?php
                        if ($product[$i]->StockDispo != 0){ ?>
                          <a href="<?php echo $lien ?>"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i></button></a>

                          <button class="btn btn-warning"><i class="fa fa-clock-o"></i></button>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /row -->
        </div>
        <!-- /STORE -->

        <!-- store bottom filter -->
        <div class="store-filter clearfix">
          <div class="pull-left">
            <div class="row-filter">
              <a href="#"><i class="fa fa-th-large"></i></a>
              <a href="#" class="active"><i class="fa fa-bars"></i></a>
            </div>
            <div class="sort-filter">
              <span class="text-uppercase">Trier par:</span>
              <select class="input">
                  <option value="0">Position</option>
                  <option value="0">Prix</option>
                  <option value="0">Evaluation</option>
                </select>
              <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
            </div>
          </div>
          <div class="pull-right">
            <div class="page-filter">
              <span class="text-uppercase">Afficher:</span>
              <select class="input">
                  <option value="0">10</option>
                  <option value="1">20</option>
                  <option value="2">30</option>
                </select>
            </div>
            <ul class="store-pages">
              <li><span class="text-uppercase">Page:</span></li>
              <li class="active">1</li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- /store bottom filter -->
      </div>
      <!-- /MAIN -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
