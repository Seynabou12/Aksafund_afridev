<div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
        <h1 class="h4 text-gray-800">
            <?= $this->fetch('title') ?>
        </h1>
        <!--<a href="<?= $this->Url->build(['action'=>'add']) ?>" class="btn-sm btn-primary text-white">Ajouter une participation<i class="fas fa-plus-circle ml-2"></i></a>-->
    </div>
</div>
        
 <?= $this->Element('Admin/participation'); ?>
    <?php $this->start('script'); ?>
<!-- Page le*vel plugins -->
<?= $this->Element('Admin/datatable') ?>
<?php $this->end(); ?>