<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <form action="<?php echo site_url("Shop/$action") ?>" method="post" id="checkout-form" class="clearfix" >

        <input name="id" type="hidden" <?php if (isset($boutique)) echo "value = \"" .  $boutique[0]->IdBoutique . "\""?>>

        <div class="col-md-6">
          <div class="billing-details">
            <div class="section-title">
              <h3 class="title">Créer une boutique</h3>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Numero Siret :</label>
              <input class="input" type="text" name="siret" placeholder="N° Siret" <?php if (isset($boutique)) echo "value = \"" . $boutique[0]->NumSIRET . "\""?> >
            </div>
            <div class="form-group">
              <label class=" form-control-label">Nom de la boutique :</label>
              <input class="input" type="text" name="nom" placeholder="Nom" <?php if (isset($boutique)) echo "value = \"" . $boutique[0]->NomBoutique . "\""?> >
            </div>
            <div class="form-group">
              <label class=" form-control-label">Adresse :</label>
              <input class="input" type="text" name="rue" placeholder="Rue" <?php if (isset($boutique)) echo "value = \"" . $boutique[0]->RueBoutique . "\""?>>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Ville :</label>
              <input class="input" type="text" name="ville" placeholder="Ville" <?php if (isset($boutique)) echo "value = \"" . $boutique[0]->VilleBoutique . "\""?>>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Code postal :</label>
              <input class="input" type="text" name="cp" placeholder="Code postal" <?php if (isset($boutique)) echo "value = \"" . $boutique[0]->CPBoutique . "\""?>>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Numero de téléphone</label>
              <input class="input" type="tel" name="tel" placeholder="Numéro de Tel" <?php if (isset($boutique)) echo "value = \"" . $boutique[0]->TelBoutique . "\""?>>
            </div>
            <div class="form-group">
              <label class=" form-control-label">E-mail:</label>
              <input class="input" type="email" name="mail" placeholder="Email" <?php if (isset($boutique)) echo "value = \"" . $boutique[0]->MailBoutique . "\""?>>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Horaire :</label>
              <textarea name="horaire" placeholder="Inserez les horaires d'ouvertures ici" rows="10" cols="75" ><?php if (isset($boutique)) echo $boutique[0]->HorairesBoutique ?></textarea>
            </div>
            <button class="primary-btn">Valider</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
