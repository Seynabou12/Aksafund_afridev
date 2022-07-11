<!-- <?= $this->assign('title', $type); ?> -->

<section style="display:none">
    <div class="row">
        <div class="col-md-12" >
            <div class="slick-slider2 m-auto">
                <?php  for ($i=0; $i < count($causes); $i++) { ?>
                    <?php $img= $causes[$i]->fichiers[0]->name;  ?> 
                    <div class="col-md-12" style=";background-size:cover;;background-position:center center;height: 500px;background-image: url('<?= $this->Url->Image($img) ?>')">
                        <div class="d-flex align-items-start flex-column bd-highlight mb-3 pt-4 ml-4 pl-4" style="height: 200px;">
                         <?php if($i== 1){} ?>
                            <div class="ml-2 bd-highlight mt-4">
                            <h1 class="h1 text-white pt-4 gros-titre">FAITES UN DON</h1>
                            </div>
                            <div class="p-2 mt-4 bd-highlight bg-orange text-white ml-2 col-md-6">
                            <h3 class="h5"><?= $causes[$i]->name?></h3> 
                            </div>
                            <div class="p-2 bd-highlight text-white col-md-4">
                                <!-- <?= $causes[$i]->desc_courte?> -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- <div class="d-flex align-items-start flex-column bd-highlight mb-3 pt-4 ml-4" style="height: 200px;">
                <div class="mt-5 mb-4 p-2 pt-4 bd-highlight">
                <h1 class="h1 text-white pt-4 gros-titre">FAITES UN DON</h1>
                </div>
                <div class="p-2 bd-highlight bg-orange text-white ml-2">
                <h3 class="h5">POUR UNE CAUSE OU UN PROJET</h3> 
                </div>
                <div class="p-2 bd-highlight text-white">Pariciper à une cause noble pour aider !</div>
            </div> -->
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

<section class="section4">
    <div class="categories row">
        <div class="col-md-12 causes_titre">
            <?= $type ?>
            <div class="title-icon">
                <i class="fas fa-hand-holding-heart text-orange"></i>
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6 paragraphe mb-4" >
        <?php if($type == "Projets"){?>
        Il y a beaucoup d'idées, de projets qui méritent une collecte de fonds.<br> Ceux qui les partagent croient en votre soutien, vos bonnes actions.
        <?php }else{ ?>
        Nous croyons que les associations sont créateurs d’un lien inestimable pour le vivre ensemble.
         C’est pour les aider dans leurs activités que notre équipe a construit une solution à leur image.
        <?php } ?>
        </div>
    </div>
    <div class="causes">
        <div class="col-md-12">
            <div class="row categories d-flex justify-content-center">
                <!-- <div class="categories_titre col-md-12">Causes</div> -->
                <?php if(!empty($causes)): for ($i=0; $i < count($causes) ; $i++) {$part= 0;if( $causes[$i]->participations) $part= $causes[$i]->participations[0]->somme;  ?>
                    <div class="col-md-4 col-sm-6 causes_block">
                        <div class="">
                            <div class="card">
                                <div class="overlay"></div>
                                <img src="<?= $this->Url->Image($causes[$i]->fichiers[0]->name) ?>">
                                <span class="titre">
                                    <?= $causes[$i]->name; ?>
                                </span>
                                <div class="progress" style="margin:0 20px">
                                    <div class="progress-bar text-blanc bg-orange" role="progressbar" style="width: <?php $percent= $part/($causes[$i]->montant); echo $this->Number->format($percent*100 )?>%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"><?= $this->Number->format($percent*100) ?> %</div>
                                </div>
                                <div class="part" style="display:block">
                                    <div class="participation">Participations<br>
                                        <span class="price">
                                        <?php 
                                            echo $this->Number->format($part,['locale'=>"fr_FR",'after'=>" FCFA"])
                                        ?>
                                        </span>
                                    </div>
                                    <div class="objectif">Objectif<br> <span class="price"><?= $this->Number->format($causes[$i]->montant,['locale'=>"fr_FR",'after'=>" FCFA"]); ?></span></div>
                                </div>
                                <br>
                                <?php if($causes[$i]->status == 1){?>
                                <a href="<?=$this->Url->Build(['controller'=>'Campagnes','action'=>'campagne',$causes[$i]->id]) ?>" class="btn btn-primary">Faire un don <i class="fa fa-arrow-right"></i></a>
                            <?php } else{?>
                                <a href="#" style="background: #f26522 !important;" class="btn btn-warning">Campagne Clôturée</a>
                            <?php } ?>
                                <!-- <a href="<?=$this->Url->Build(['controller'=>'Campagnes','action'=>'campagne',$causes[$i]->id]) ?>" class="btn btn-primary">Plus de détails <i class="fa fa-arrow-right"></i></a> -->
                        
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
                                <a href="" class="btn btn-primary">Plus de détails <i class="fa fa-arrow-right"></i></a>
                                </div>
                        </div>
                    </div>
                <?php }  endif; ?>
            </div>
        </div> -->
    </div>
</section>