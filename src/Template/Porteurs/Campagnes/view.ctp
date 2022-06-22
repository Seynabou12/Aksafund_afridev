<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campagne $campagne
 */
?>
<div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
        <h1 class="h4 text-gray-800">
            <span class="h6 collapse-header text-primary">
                Titre de la campagne
            </span><br>
            <?= h($campagne->name) ?>
        </h1>
        <a href="<?= $this->Url->build(['action' => 'index']); ?>" class="btn btn-sm btn-primary text-white px-3 text-white mr-2"><i class="fas fa-arrow-left"></i></a>
    </div>
</div>

<div class="col-md-7 col-lg-7 col-xs-7">
    <div class="card mb-2">
        <div class="card-header bg-primary text-white">
                Informations Suplémentaires
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <label for="" class="col-6">Création</label>  <?= $campagne->created->nice('Europe/Paris','fr-Fr')  ?>
            </div>
            <div class="col-md-12">
                <label for="" class="col-6">Site  web</label>   <a href="http://<?= $campagne->lien ?>"> <?= $campagne->lien ?></a> 
            </div>
            <div class="col-md-12">
                <label for="" class="col-6">Statut </label>    <?= $this->Statut->getStatut($campagne->status ); ?>
            </div>
            <div class="col-md-12">
                <label for="" class="col-6">Objectif </label>    <?= $this->Number->Format($campagne->montant) ; ?> FCFA
            </div>
        </div>
    </div>
    <div class="card mb-2">
        <div class="card-header bg-primary text-white">
                Résumé
        </div>
        <div class="card-body">
            
            <?= h($campagne->desc_courte) ?>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            Présentation
        </div>
        <div class="card-body">
            <p class="card-text">
            <?= h($campagne->desc_longue) ?>
            </p>
        </div>
    </div>
</div>

<div class="col-md-5 col-lg-5 col-xs-5">
        
    <?php foreach ($campagne->fichiers as $key => $value) { ?>
        <div class="card mb-2">
            <div class="col-md-12 slider p-2">
                <div class="bg1">
                    <img src="<?= $this->Url->Image($value->name); ?>" height="200px" width="100%" style="object-fit:cover">
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<div class=" col-md-12 mt-5">
    <div class="card">
        <div class=" card-header text-primary">
            Liste des Participations
        </div>
        <div class="card-body">
        <?= $this->Element('Admin/participation'); ?>
        </div>
    </div>
</div>
<?php $this->start('script'); ?>
<!-- Page le*vel plugins -->
<?= $this->Element('Admin/datatable') ?>
<?php $this->end(); ?>