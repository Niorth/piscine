<div class="row">
  <div class="col-md-6 col-sm-3 col-xs-3">

    <br>
        <br>Nom : <?php echo $boutique[0]->NomBoutique ?>
        <br>N° SIRET : <?php echo $boutique[0]->NumSIRET ?>
        <br>Adresse : <?php echo $boutique[0]->RueBoutique ?>
        <br><?php echo $boutique[0]->VilleBoutique ?>
        <br>Code Postal : <?php echo $boutique[0]->VilleBoutique ?>
        <br>N° Téléphone : <?php echo $boutique[0]->TelBoutique ?>
        <br>E-mail : <?php echo $boutique[0]->MailBoutique ?>
        <br>Horaires d'ouverture:
        <br><?php echo $boutique[0]->HorairesBoutique ?>
      </p>
      <a href="<?php $id = $boutique[0]->IdBoutique; echo site_url("Shop/modify_shop_page/$id")?>"><button class="primary-btn">Modifier</button></a>
  </div>

    <div class="col-md-6 col-sm-3 col-xs-3">

        <form action="<?php echo site_url("Trader/linkTraderShop") ?>" method="post" id="checkout-form" class="clearfix" >
            <select name="trader">
              <?php
                  foreach($commercant as $item){
              ?>
                    <option value="<?php echo $item->NumCommercant ?>"> <?php echo $item->NomCommercant ?> </option>
                  <?php  } ?>
        </select>
            <input name="IdBoutique" type="hidden" value = "<?php echo $boutique[0]->IdBoutique ?>" >
       <button class="primary-btn">Valider</button>
        </form>
    </div>
</div>
