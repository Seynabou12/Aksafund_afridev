<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = 'default';


$cakeDescription = 'Aksafund: plateforme de collecte de fonds';

?>
<?php // $this->assign('title', 'plateforme de collecte de fonds'); ?>

<style type="text/css">
    .partenaires>img{
            margin: 0 15px;
    }
</style>
<section>
    <div class="row">
        <div class="col-md-12" >
            <div class="slick-slider2 m-auto">
                <?php  foreach ($slider as $key ) { ?>
                    <div class="col-md-12" style=";background-size:cover;;background-position:center center;height: 500px;background-image: url('<?= $this->Url->Image($key->images) ?>')">
                        <div class="title-slider d-flex align-items-start flex-column bd-highlight mb-3" style="height: 200px;">
                            <div class="ml-2 bd-highlight mt-4">
                            <h1 class="h1 text-white pt-4 gros-titre"><?= $key->titre ?></h1>
                            </div>
                            <div class="p-2 mt-4 bd-highlight bg-orange text-white ml-2">
                            <div class="soustitre font-weight-bold">POUR UNE CAUSE OU UN PROJET</div>
                            </div>
                            <div class="p-2 bd-highlight text-white"> <?= $key->description ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            
        </div>
    </div>
    <div class="row section1 m-2">
        <div class="col-md-4 ml-auto mr-0 section1_block projets">
            <div class="">
                <div class="section1_block_titre">Projets</div>
                <div class="section1_block_description">
                    Il y a beaucoup d'idées, de projets qui méritent une collecte de fonds.
                    Ceux qui les partagent croient en votre soutien, vos bonnes actions. Vous pouvez les aider en contribuant à leur développpement.
                </div>
            </div>
        </div>
        <div class="col-md-4 ml-0 mr-auto section1_block social text-left">
            <div class="">
                <div class="section1_block_titre">Social</div>
                <div class="section1_block_description">
                    Nous croyons que les associations sont créateurs d’un lien inestimable pour le vivre ensemble.
                    C’est pour les aider dans leurs activités que notre équipe a construit une solution à leur image.
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row header_slider">
        <div class="col-12 col-sm-6 col-md-6 header_slider_left causes">
        <div class="slick-slider2">
            <?php if(!empty($projets)): for ($i=0; $i < count($projets); $i++) { ?>
                <div class="col-md-12 slider p-2">
                    <div class="bg1" style="background-image:url('<?=$this->Url->Image($projets[$i]->fichiers[0]->name); ?>')">
                    </div>
                    <div class="slider_p">
                        <p class="titre"><?= $projets[$i]->name; ?></p>
                        <p class="description">
                            <?= $projets[$i]->desc_courte; ?>
                        </p>
                    </div>

                </div>
            <?php } endif;?>
        </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 header_slider_left causes">
        <div class="slick-slider2">
            <?php if(!empty($causes)): for ($i=0; $i < count($causes); $i++){?>
                <div class="col-md-12 slider p-2">
                    <div class="bg1" style="background-image:url('<?=$this->Url->Image($causes[$i]->fichiers[0]->name) ?>')">
                    </div>
                    <div class="slider_p text ellipsis">
                        <p class="titre"><?= $causes[$i]->name; ?></p>
                        <p class="description">
                            <?= $causes[$i]->desc_courte; ?>
                        </p>
                    </div>

                </div>
            <?php } endif;?>
        </div>
        </div>
    </div> -->
</section>
<section class="section2">
    <div class="causes">
        <div class="col-md-12 causes_titre">
               C'est quoi <span class="text-orange text-orange"> <?= $parametre->nomPlateforme  ?> </span> 
              
            <!-- C'est quoi <span class="text-orange text-orange">Aksafund ?</span> -->
            <div class="title-icon">
                <i class="fas fa-hand-holding-heart text-orange"></i>
            </div>
        </div>
        <div class="mb-4 paragraphe" style="font-size:14px">
            <!-- La plateforme web Aksafund a été spécialement conçue <br>pour la collecte de fonds et les services aux associations. -->
        </div>
    </div>
    <div class="row">
         <div class="col-md-12 section2_img">
            <?php foreach($image as $key) {?>
                <span> <img src="<?= $this->Url->Image($key->image) ?>"></span>
            <?php } ?>
         </div>
         <div class="section2_titre col-md-12 text-center mt-2 ">
            <p >Vous avez des projets ou causes à défendre ?<br> Nous vous y aidons.</p>

            <?php if(isset($current)) :?>
                <?php if($current->roles[0]->profil_id == 2) :?>
                    <a href="/porteurs/campagnes/add"  class="btn text-white waves-effect waves-light" style="background-color: #f26522 !important;border-radius:50px">Créer une campagne</a>
                <?php else: ?>
                    <a href="/admin/campagnes/add"  class="btn text-white waves-effect waves-light" style="background-color: #f26522 !important;border-radius:50px">Créer une campagne</a>
                <?php endif;?>
            <?php else: ?>
                <a href="/authentification/login"  class="btn text-white waves-effect waves-light" style="background-color: #f26522 !important;border-radius:50px">Créer une campagne</a>
            <?php endif;?>
         </div>
         
    </div>
</section>
<section class="section3">
    <div class="causes">
        <div class="col-md-12 causes_titre">
            Dernières <span class="text-orange text-orange">campagnes</span>
            <div class="title-icon">
            <i class="fas fa-hand-holding-heart text-orange"></i>
              </div>
            </div>
        </div>
        <p class="paragraphe text-center mb-4 p-4" >
            La plateforme a pour rôle de permettre aux participants de faire des contributions et de pouvoir suivre les campagnes en ligne.<br> De ce fait le processus de donation devient plus facile et plus transparent.
        </p>
    <div class="col-md-12" style="margin:0">
        <div class="slick-slider1">
            <?php for ($j=0; $j < count($campagnes) ; $j++) { $part=0; if($campagnes[$j]->participations) $part = $campagnes[$j]->participations[0]->somme;
                ?>

                <div class="causes_block">
                    <div class="col-md-12">
                        <div class="card causes_block_image">
                            <div class="overlay"></div>
                            <img src="<?= $this->Url->Image($campagnes[$j]->fichiers[0]->name) ?>">
                            <span class="titre">
                                <?= $campagnes[$j]->name; ?>
                            </span>
                            <?php if($campagnes[$j]->status == 1){?>
                                <div class="progress" style="margin:0 20px">
                                    <div class="progress-bar text-blanc bg-orange" role="progressbar" style="width: <?php $percent= $part/($campagnes[$j]->montant); echo $this->Number->format($percent*100 )?>%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"><?= $this->Number->format($percent*100) ?> %</div>
                                </div>
                                <div class="part" style="display:block">
                                    <div class="participation">Participations<br>
                                        <span class="price">
                                        <?php
                                            echo $this->Number->format($part,['locale'=>"fr_FR",'after'=>" FCFA"])
                                        ?>
                                        </span>
                                    </div>
                                    <div class="objectif">Objectif<br> <span class="price"><?= $this->Number->format($campagnes[$j]->montant,['locale'=>"fr_FR",'after'=>" FCFA"]); ?></span></div>
                                </div>
                                <br>
                                <a href="<?=$this->Url->Build(['controller'=>'Campagnes','action'=>'campagne',$campagnes[$j]->id]) ?>" class="btn btn-primary">Faire un don <i class="fa fa-arrow-right"></i></a>
                            <?php } elseif ($campagnes[$j]->status == 3){?>
                                <div class="part" style="display:block">
                                    <div class="objectif" style="float:none;text-align:center;font-size:16px;height: 52px;">Campagne clôturée<br> <span class="price"><?= $this->Number->format($part,['locale'=>"fr_FR",'after'=>" FCFA"]); ?> </span>collectés</div>
                                </div>
                                <br>
                                <a href="<?=$this->Url->Build(['controller'=>'Campagnes','action'=>'campagne',$campagnes[$j]->id]) ?>" class="btn btn-primary">Plus de détails <i class="fa fa-arrow-right"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- sction qui sommes nous -->
<section class="section3">
    <div class="qsn ">
        <div class="col-md-12 qsn_titre ">Qui soms<span class="text-orange text-orange">es-nous ?</span>
            <div class="title-icon">
                <i class="fas fa-hand-holding-heart text-orange"></i>
            </div>
        </div>
        <div class="col-md-12 qsn_contenu">
            <div class="row qsn">
                <div class="col-md-8 col-5 qsn_contenu_parag">
                    <?php foreach($section as $key) {?>
                    <?= $key->texte ?>
                    <!-- La plateforme web Aksafund a été spécialement conçue pour la collecte de fonds et les services aux associations.
                    La plateforme a pour rôle de permettre aux participants de faire des contributions et de pouvoir suivre les campagnes en ligne.
                    De ce fait le processus de donation devient plus facile et plus transparent. -->
                    <?php } ?>
                </div>
                <div class="col-md-2 col-5 qsn_contenu_annonce">
                    <i class="fa fa-bullhorn col-md-12"></i>
                    <p class="qsn_contenu_annonce_titre">FAITES UN GESTE !</p>
                    <p class="qsn_contenu_annonce_parag">
                        Soutenez le projet <?= $parametre->nomPlateforme ?> et participez, comme des milliers d'autres volontaires à accelerer l'évolution des actions sociales en cours
                    </p>


                </div>
            </div>
        </div>
    </div>

</section>
<section class="section4" style="display:none">
    <div class="categories">
        <div class="col-md-12 causes_titre">
            Caté<span class="text-orange">gories</span>
            <div class="title-icon">
                <i class="fas fa-hand-holding-heart text-orange"></i>
            </div>
        </div>
        <p class="paragraphe" >
        La plateforme a pour rôle de permettre aux participants de faire des contributions<br et de pouvoir suivre les campagnes en ligne.<br> De ce fait le processus de donation devient plus facile et plus transparent.
        </p>
    </div>
    <div class="causes">
        <div class="col-md-12">
            <div class="row categories">
                <!-- <div class="categories_titre col-md-12">Causes</div> -->
                <?php if(!empty($causes)): for ($i=0; $i < count($causes) ; $i++) {  ?>
                    <div class="col-md-4 col-sm-6 causes_block">
                        <div class="">
                            <div class="card">
                                <span class="p-2 h6 text-left"> <?= $causes[$i]->category->typecategory->name.' : <span class="badge p-1 bg-orange text-white">'.$causes[$i]->category->name?></span></span>
                                <img src="<?= $this->Url->Image($causes[$i]->fichiers[0]->name) ?>">
                                <span class="titre">Achat d'un véhicule utilitaire pour l'horphelinat Daaray Serigne Saliou</span>
                                <p>Cette caravane don de sang vise à installer des cellules
                                        de collecte dans différentes régions du Sénégal, afin
                                </p>
                                <div class="progress" style="margin:0 20px">
                                    <div class="progress-bar bg-orange text-white" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                <div class="part" style="display:block">
                                    <div class="participation">Participations<br><span class="price">120.000 FCFA</span></div>
                                    <div class="objectif">Objectifs<br> <span class="price">3.000.000 FCFA</span></div>

                                </div>
                                <br>
                                <a href="" class="btn btn-primary">Plus de détails <i class="fa fa-arrow-right"></i></a>
                                </div>
                        </div>
                    </div>
                <?php }  endif; ?>
            </div>
        </div>
        <!-- <div class="col-md-12">
            <div class="row categories">
                <div class="categories_titre col-md-12">Causes</div>
                <?php if(!empty($causes)): for ($i=0; $i < count($causes) ; $i++) { ?>
                    <div class="col-md-4 col-sm-6 causes_block">
                        <div class="">
                            <div class="card">
                                <img src="<?= $this->Url->Image($causes[$i]->fichiers[0]->name) ?>">
                                <span class="titre">Achat d'un véhicule utilitaire pour l'horphelinat Daaray Serigne Saliou</span>
                                <p>Cette caravane don de sang vise à installer des cellules
                                        de collecte dans différentes régions du Sénégal, afin
                                </p>
                                <div class="progress" style="margin:0 20px">
                                    <div class="progress-bar bg-orange" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                <div class="part" style="display:block">
                                    <div class="participation">Participations<br><span class="price">120.000 FCFA</span></div>
                                    <div class="objectif">Objectifs<br> <span class="price">3.000.000 FCFA</span></div>

                                </div>
                                <br>
                                <a href="" class="btn btn-primary">Plus de détails <i class="fa fa-arrow-right"></i></a>
                                </div>
                        </div>
                    </div>
                <?php }  endif; ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row categories">
                <div class="categories_titre col-md-12">Projets</div>
                <?php if(!empty($projets)): for ($i=0; $i < count($projets) ; $i++) { ?>
                    <div class="col-md-4 col-sm-6 causes_block">
                        <div class="">
                            <div class="card">
                                <img src="<?= $this->Url->Image($projets[$i]->fichiers[0]->name) ?>">
                                <span class="titre">
                                    <?= $projets[$i]->name ?>
                                </span>
                                <p>
                                <?= $projets[$i]->desc_courte ?>
                                </p>
                                <div class="progress" style="margin:0 20px">
                                    <div class="progress-bar bg-orange" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                <div class="part" style="display:block">
                                    <div class="participation">Participations<br><span class="price">120.000 FCFA</span></div>
                                    <div class="objectif">Objectifs<br> <span class="price">3.000.000 FCFA</span></div>

                                </div>
                                <br>
                                <a href="" class="btn btn-primary">Faire un don <i class="fa fa-arrow-right"></i></a>
                                </div>
                        </div>
                    </div>
                <?php }  endif; ?>
            </div>
        </div> -->
    </div>
</section>

<!-- Section Nos Partenaires -->
    <section class="section3">
        <div class="categories">
            <div class="col-md-12 causes_titre text-center">
                Nos Part<span class="text-orange">enaires</span>
                <div class="title-icon">
                    <i class="fas fa-hand-holding-heart text-orange"></i>
                </div>
            </div>
            <div class="partenaires d-flex justify-content-center mb-4">
               
                <img src="img/afridev.png" alt="" width="100px" height="100%">
                <img src="img/2stv.png" alt="" width="100px" height="100%">
                <img src="img/ms.png" alt="" width="100px" height="100%">
                <img src="img/paydunya.jpeg" alt="" width="100px" height="100%">
            </div>
        </div>
        <div class="causes">
            <div class="col-md-12">
            </div>
        </div>
    </section>
