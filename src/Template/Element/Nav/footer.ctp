<style>

</style>
<div class="footer container">
    <div class="row p-4" >
        <div class="col-md-4 footer_block" id="about">
            <p><img src="<?= $this->Url->Image('logo.png') ?>" width="100px"></p>
            <p>
                La plateforme web <?= $parametre->nomPlateforme ?> a été spécialement conçue pour la collecte de fonds et les services aux associations. La plateforme a pour rôle de permettre aux participants de faire des contributions et de pouvoir suivre les campagnes en ligne. De ce fait le processus de donation devient plus facile et plus transparent.
            </p>
        </div>
        <div class="col-md-4 footer_block">
            <p class="titre">Catégories</p>
            <ul class="bas">
                <?php foreach ($types as $key => $value) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?= $this->Url->Build(['controller'=>'Campagnes','action'=>'categorie',$value->id]) ?>">
                        <?= $value->name ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-md-4 footer_block" id="contact">
            <p class="titre">Contact</p>
            <p class="d-flex">
                <span><i class="fa fa-phone text-orange"></i> </span>
                <span class="ml-2">(+221) <?= $parametre->telephone ?></span>
            </p>
            <p class="d-flex">
                <span><i class="fa fa-map-marked text-orange"></i> </span>
                <span class="ml-2"> <?= $parametre->adresse ?></span>
            </p>
        </div>
    </div>
</div>
<div class="footer_bottom container">
    <div class="col-md-12 ">
    COPYRIGHT 2019 - <a href="https://www.afridev-group.com">Afridev Group</a>. Tous les droits réservés Termes & Conditions d'utilisation
    </div>
</div>
