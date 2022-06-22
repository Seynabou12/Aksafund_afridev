
<div class="row">
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
    <div class="col-md-8 ">
        
        <div class="card  mt-2  campagne">
            <div class="card-header">Renseigner le formulaire pour participer à la campagne</div>
            <div class="card-body">
                <form>
                    <div class="form-group row input">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nom">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="form-group row input">
                        <div class="col">
                            <input type="Email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row input">
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Téléphone">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Adresse">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" required class="form-control" placeholder="ex: 1000" min="1000" step="100">
                        <div class="input-group-prepend ">
                            <span class="input-group-text text-orange" id="basic-addon1">FCFA</span>
                        </div>
                        <small id="emailHelp" class="col-md-12 text-orange form-text text-muted">Montant minimal requis 1000 fcfa.</small>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="anonyme">
                        <label class="form-check-label" for="gridCheck">
                            Anonymat
                        </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                </form>
            </div>
        </div>
        
    </div>
    <div class="col-md-4 ">
        <div class="card  bg-bleu">
            <div class="card-body">
                <div class="paragraphe text-white">
                    <h4 class="h6">SOMME COLLECTÉE</h4>
                    <h3 class="font-weight-600"><?= $this->Number->format(0,['locale'=>'fr_FR','after'=>' FCFA'])?></h1>
                    <h4 class="h6">OBJECTIF</h4>
                    <h3 class="font-weight-600"><?= $this->Number->format($campagne->montant ,['locale'=>'fr_FR','after'=>' FCFA'])?></h1>
                </div>
                <div class="col-md-12 text-center">
                    <a href="<?= $this->Url->Build(['action'=>'donate',$campagne->id])?>" id="soutenir" class="btn btn-sm bg-white text-orange font-weight-bold"> soutenir cette campagne</a>
                </div>
                <div class="col-md-12 text-white text-center">
                   <span class="f12">ou appeler le </span>  <br> 
                   <span class="font-weight-bold">77 462 33 52</span>
                </div>
            </div>
        </div>
    </div>
</div>
 
<script>
$( "input" ).change(function() {
    var $input = $( this );
    if($input.prop( "checked" ) == true ){
        $('.input').hide();
    }
    else{
        $('.input').show();
    }
});
</script>
