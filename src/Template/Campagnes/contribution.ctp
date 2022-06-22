
<?php
$this->assign('title', 'Plateforme de collecte de fonds');
?>
<div class="row" style="display:none">
    <div class="col-md-12" style=";background-size:cover;;background-position:center center;height: 400px;background-image: url('<?= $this->Url->Image($campagne->fichiers[0]->name) ?>')">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3 pt-4 ml-4" style="height: 200px;">
            <div class="ml-2 bd-highlight mt-4">
            <!-- <h1 class="h1 text-orange pt-4 gros-titre">FAITES UN DON</h1> -->
            </div>
            <!-- <div class="p-2 bd-highlight text-white">Participer à une cause noble pour aider !</div> -->
        </div>
    </div>
</div>
<div class="row p-2 m-2">
    <div class="col-md-12">
        <label for="" class="">Titre de la campagne </label>
        <h3 class="h6 text-orange"> <?= $campagne->name; ?></h3> 
    </div>
    <div class="col-md-8 mb-2">
        
        <div class="card  mt-2  campagne">
            <div class="card-header">Saisir le montant de la contribution</div>
            <div class="card-body">
                <form method="post">
                    <div class="">
                        <div class="col">
                        <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken') ?>">
                            <input type="hidden" name="campagne_id" value="<?= $campagne->id?>" class="form-control" placeholder="Nom">
                            <input type="hidden" name="nom" class="form-control" placeholder="Nom">
                        </div>
                        <div class="col">
                            <input type="hidden" name="prenom" class="form-control" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="">
                        <div class="col">
                            <input type="hidden" name="email" value="ndiayeyoussoupha1@gmail.com" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="">
                        <div class="col">
                            <input type="hidden" name="telephone" class="form-control" placeholder="Téléphone">
                        </div>
                        <div class="col">
                            <input type="hidden" name="adresse" class="form-control" placeholder="Adresse">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" name="montant" required class="form-control" placeholder="ex: 300" min="300" step="100">
                        <div class="input-group-prepend ">
                            <span class="input-group-text text-orange" id="basic-addon1">FCFA</span>
                        </div>
                        <small id="emailHelp" class="col-md-12 text-orange form-text text-muted">Montant minimal requis 300 fcfa.</small>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input" name="anonyme" value="1" type="checkbox" id="anonyme">
                        <label class="form-check-label" for="gridCheck">
                            Anonymat (<span style="font-size:10px;font-style: italic;">cette option masque vos informations personnelles sur la liste des contributeurs</span>)
                        </label>
                        </div>
                    </div> 
                    <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                </form>
                <img src="<?= $this->Url->Image('paiement.png') ?>" width="100%" alt="">

            </div>
        </div>
        
    </div>
    <div class="col-md-4 ">
        <div class="card  bg-bleu" style="height:269px">
            <div class="card-body">
                <div class="paragraphe text-white">
                    <h4 class="h6">SOMME COLLECTÉE</h4>
                    <h3 class="font-weight-600"><?php $somme=0; if($campagne->participations){$somme=$campagne->participations[0]->somme;} echo $this->Number->format($somme,['locale'=>'fr_FR','after'=>' FCFA']);?></h1>
                    <h4 class="h6">OBJECTIF</h4>
                    <h3 class="font-weight-600"><?= $this->Number->format($campagne->montant ,['locale'=>'fr_FR','after'=>' FCFA'])?></h1>
                </div>
                <div class="col-md-12 text-center">
                    <a href="<?= $this->Url->Build(['action'=>'contribution',$campagne->id])?>" id="soutenir" class="btn btn-sm bg-white text-orange font-weight-bold"> Faire un don</a>
                </div>
                <!--<div class="col-md-12 text-white text-center">
                   <span class="f12">ou appeler le </span>  <br> 
                   <span class="font-weight-bold">77 462 33 52</span>
                </div>-->
            </div>
        </div>
    </div>
</div>
 
<script>
$("#anonyme" ).change(function() {
    var $input = $( this );
    if($input.prop( "checked" ) == true ){
        $('.input').hide();
    }
    else{
        $('.input').show();
    }
});
</script>
