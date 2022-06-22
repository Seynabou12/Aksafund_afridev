<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row page">
    <div class="col-md-6 col-6 pull-left page_header p-0">
        <span class="page_header_title">Ajouter un rôle</span>
    </div>
    <div class="col-md-6 col-6 text-right" style="padding:0">
        <a  class="btn btn-primary pull-right btn-sm btn-titre" href="<?php echo $this->Url->build(array('action' => 'index')); ?>">
            <i class="fa fa-chevron-left icone"></i>  Retour
        </a>
    </div>
    <div class="col-md-12 page_body">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <?php
            echo $this->Form->control('user_id', ['options' => $users,'class'=>'form-control','label'=>'Nom']);
            echo $this->Form->control('profil_id', ['options' => $profils,'class'=>'form-control','label'=>'Profil']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-primary btn-sm btn-titre btn-submit']) ?>
    <?= $this->Form->end() ?>
</div>
