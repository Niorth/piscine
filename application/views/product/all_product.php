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
          <h3 class="aside-title">Filter by Price</h3>
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

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Nom Produit + Vendeur + evaluation</th>
                  <th scope="col">Disponibilité</th>
                  <th scope="col">Prix + bouton ajout panier</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($product as $item){
                  $lien = site_url("Product/product_page/$item->CodeProduit");?>
                  <tr>
                    <td><img src="./img/thumb-product01.jpg" alt="Image du produit" width="160" height="90" ></td>
                    <td>
                      <div class="row">
                        <a href="<?php echo $lien ?>"><h4 class="product-name"><?php if (isset($item)) echo $item->LibelleProduit;?></h2></a>
                      </div>
                      <div class="row">
                        <?php  if (isset($item)) echo $item->NomBoutique ?>
                      </div>
                    </td>
                    <td><?php echo $item->CodeProduit; ?></td>
                    <td>
                        <div class="row">
                          <?php echo $item->PrixProd . " €"; ?>
                        </div>
                        <div class="row">
                          <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                        </div>
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
