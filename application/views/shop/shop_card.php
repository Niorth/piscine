<div class="row">
  <div class="col-md-6 col-sm-3 col-xs-3">
    <p>
        Nom : <?php echo $boutique[0]->NomBoutique ?>
        <br>N° SIRET : <?php echo $boutique[0]->NumSIRET ?>
        <br>Adresse : <?php echo $boutique[0]->RueBoutique ?>
        <br><?php echo $boutique[0]->VilleBoutique ?>
        <br>Code Postal : <?php echo $boutique[0]->VilleBoutique ?>
        <br>N° Téléphone : <?php echo $boutique[0]->TelBoutique ?>
        <br>E-mail : <?php echo $boutique[0]->MailBoutique ?>
        <br>Horaires d'ouverture:
        <br><?php echo $boutique[0]->HorairesBoutique ?>
      </p>
      <a href="<?php $id = $boutique[0]->IdBoutique; echo site_url("Shop/modify_shop_page/$id")?>"><button class="primary-btn">Modifier</button>
  </div>
</div>
