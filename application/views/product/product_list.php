<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">En rupture de stock</h3>
        </div>

        <?php if (empty($p_unavailable)){ ?>

          <p><strong>Vous n'avez aucun produit en rupture de stock</strong></p>

        <?php } else{ ?>

          <div class="input-group col-md-8">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" id="recherche"class="form-control" onkeyup="recherche()" placeholder="Entrez le nom d'un produit">
          </div>

          <br>

          <table class="shopping-cart-table table" id="table" >
            <thead>
              <tr>
                <th>N°</th>
                <th>Produit</th>
                <th></th>
                <th class="text-center">Prix</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($p_unavailable as $item){
                $lien = site_url("Product/product_page/$item->CodeProduit");
                $lien1 = site_url("Product/update_product_page/$item->CodeProduit");
                $img = $item->ImgProd;
                ?>

                <tr>
                  <td><?php echo $item->CodeProduit; ?></td>
                  <td class="thumb"><img src="<?php echo base_url() . "assets/img/" . $img ?>"></td>
                  <td class="details">
                    <a href="<?php echo $lien ?>"><?php echo $item->LibelleProduit; ?></a>
                  </td>
                  <td class="price text-center"><?php echo $item->PrixProd; ?> €</td>
                  <td class="qty text-center">
                    <form action="<?php echo site_url("Product/update_product_stock/$item->CodeProduit"); ?>" method="post" >
                    <input class="input" name="stock" type="number" min="0" <?php echo "value = \"" . $item->StockDispo . "\"" ?>>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo $lien1 ?>" class="btn btn-warning"><i class="fa fa-cogs"></i></a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                    </form>
                  </td>
                </tr>

                <?php } ?>
            </tbody>
          </table>

        <?php } ?>

      </div>

      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Disponible</h3>
        </div>

        <?php if (empty($p_available)){ ?>

          <p><strong>Vous n'avez aucun produit disponible</strong></p>

        <?php } else{ ?>

          <div class="input-group col-md-8">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" id="recherche1"class="form-control" onkeyup="recherche1()" placeholder="Entrez le nom d'un produit">
          </div>

          <br>

          <table class="shopping-cart-table table" id="table1" >
            <thead>
              <tr>
                <th>N°</th>
                <th>Produit</th>
                <th></th>
                <th class="text-center">Prix</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($p_available as $item){
                $lien = site_url("Product/product_page/$item->CodeProduit");
                $lien1 = site_url("Product/update_product_page/$item->CodeProduit");
                $img = $item->ImgProd;
                ?>

                <tr>
                  <td><?php echo $item->CodeProduit; ?></td>
                  <td class="thumb"><img src="<?php echo base_url() . "assets/img/" . $img ?>"></td>
                  <td class="details">
                    <a href="<?php echo $lien ?>"><?php echo $item->LibelleProduit; ?></a>
                  </td>
                  <td class="price text-center"><?php echo $item->PrixProd; ?> €</td>
                  <td class="qty text-center">
                    <form action="<?php echo site_url("Product/update_product_stock/$item->CodeProduit"); ?>" method="post" >
                    <input class="input" name="stock" type="number" min="0" <?php echo "value = \"" . $item->StockDispo . "\"" ?>>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo $lien1 ?>" class="btn btn-warning"><i class="fa fa-cogs"></i></a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                    </form>
                  </td>
                </tr>

                <?php } ?>
            </tbody>
          </table>

        <?php } ?>

      </div>

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->

<!-- script de recherche  -->

<script>

function recherche() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("recherche");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function recherche1() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("recherche1");
  filter = input.value.toUpperCase();
  table = document.getElementById("table1");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


</script>

<!-- /script de recherche  -->
