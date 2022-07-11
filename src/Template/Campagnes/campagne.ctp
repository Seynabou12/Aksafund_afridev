

<?php
$this->assign('title', $titre);
?>
<div class="row">
    <div class="col-md-12" style="display:none;background-size:cover;;background-position:center center;height: 400px;background-image: url('<?= $this->Url->Image($campagne->fichiers[0]->name) ?>')">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3 pt-4 ml-4" style="height: 200px;">
            <div class="ml-2 bd-highlight mt-4">
            <!-- <h1 class="h1 text-orange pt-4 gros-titre">FAITES UN DON</h1> -->
            </div>
            <!-- <div class="p-2 bd-highlight text-white">Participer à une cause noble pour aider !</div> -->
        </div>
    </div>
</div>
<div class="row p-2 m-2">
    <div class="col-md-8">
        <div class="card-presentation mb-2">
            <div class="h5 h-title bg-white">
                <?= $campagne->name; ?>
                <div class="shadowTop"></div>
            </div>
            <div class="card card-orange bg-orange campagne">
                <div class="card-body">
                    <h3 class="h5 text-white font-weight-600">Présentation</h3>
                    <p class="paragraphe paragraphe1"><?= $campagne->desc_courte; ?></p>
                    <label class="ml-0 mr-auto text-white"> <i class="fa fa-tags"></i> <?= $campagne->category->name; ?><br>
                    <?php if($campagne->lien): echo '<a class="text-white" href="'.$campagne->lien.'"> Visitez notre site web: '.$campagne->lien.'</a>'; endif; ?></label>
                    <label class="float-right text-white"><?= $campagne->created->nice('Europe/Paris','fr-Fr'); ?></label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card  bg-bleu" style="height:267px">
            <div class="card-body">

                <div class="paragraphe text-white">
                    <?php if($campagne->status == 1){ ?>
                        <h4 class="h6 libelle">SOMME COLLECTÉE</h4>
                        <h3 class="font-weight-600 montant"><?php $somme=0; if($campagne->participations){$somme=$campagne->participations[0]->somme;} echo $this->Number->format($somme,['locale'=>'fr_FR','after'=>' FCFA']);?></h3>
                        <h4 class="h6 libelle">OBJECTIF</h4>
                        <h3 class="font-weight-600 montant">
                            <?= $this->Number->format($campagne->montant ,['locale'=>'fr_FR','after'=>' FCFA'])?>

                        </h3>
                    <?php } else{ ?>
                        <h4 class="h4 libelle text-center" style="padding-top: 50px; ">Campagne clôturée</h4>
                        <h3 class="font-weight-600 montant text-center"><?php $somme=0; if($campagne->participations){$somme=$campagne->participations[0]->somme;} echo $this->Number->format($somme,['locale'=>'fr_FR','after'=>' FCFA']);?></h3>
                       <!-- <h6 class="text-center">Collectés</h6> -->
                    <?php } ?>

                </div>
                <?php if($campagne->status == 1){ ?>
                <div class="col-md-12 text-center">
                    <a href="<?= $this->Url->Build(['action'=>'contribution',$campagne->id])?>" id="soutenir" class="btn btn-sm bg-white text-orange font-weight-bold"> Faire un don</a>
                </div>
                <?php } ?>
                <button class="buy btn btn-orange" onclick="buy(this)" data-item-id="88" >
                    Faire un don
                </button>
               
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4 campagne">

        <div class="card p-4 bd-highlight mt-4">
            <h2 class="text-orange">
                Résumé
                <?php if($campagne->status == 1): ?>
                <a href="<?= $this->Url->Build(['action'=>'listContributions',$campagne->id])?>" class="btn btn-sm bg-orange float-right text-white">Voir les Contributions</a>
                <?php endif;?>
            </h2>
            <span class="paragraphe">
                <?= $campagne->desc_longue; ?>
            </span>
        </div>

    </div>
    <!-- <?php if(!empty($campagne->desc_longue)):?> -->

    <!-- <?php endif;?> -->

    <div class="col-md-12 campagne mt-2">
        <div class="slick-slider2" style="overflow:hidden !important">
            <?php foreach ($campagne->fichiers as $key => $image) {?>
                <div class="causes_block">
                    <div class="">
                        <div class="card causes_block_image">
                            <div class="overlay" style="height:100%"></div>
                            <img src="<?= $this->Url->Image($image->name) ?>">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</div>
<script>
        function buy(btn) {
            (new PayTech({
                some_post_data_1          :   2, //will be sent to paiement.php page
                some_post_data_3          :   4,
            })).withOption({
                requestTokenUrl           :   '../payment',
                method              :   'POST',
                headers             :   {
                    "Accept"          :    "text/html"
                },
                prensentationMode   :   PayTech.OPEN_IN_POPUP,
                willGetToken        :   function () {

                },
                didGetToken         : function (token, redirectUrl) {

                },
                didReceiveError: function (error) {

                },
                didReceiveNonSuccessResponse: function (jsonResponse) {

                }
            }).send();

            //.send params are optional
        }
    </script>
<script>
    $('#soutenirs').click(function(){
        $('.campagne').hide();
        $('.contribution-form').addClass('col-md-8');
        $('.contribution-form').append("<form>"+
        "<input type='number' min='1000' name='montant' class='form-control' placeholder='montant'>"+
        "</form>")
    });
</script>
