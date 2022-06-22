<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
    $this->assign('title', 'Ajout - Nouveau utilisateur');
    $this->assign('view', 'action');
    $this->assign('action', $this->Url->build(['action' => 'add']));
    $this->extend('/Cell/Admin/user/ajout'); ?>
?>
<div class="row page">
    <div class="col-md-6 col-6 pull-left page_header p-0">
        <span class="page_header_title">Ajouter un Utilisateur</span>
    </div>
    <div class="col-md-6 col-6 text-right" style="padding:0">
        <a  class="btn btn-primary pull-right btn-sm btn-titre" href="<?php echo $this->Url->build(array('action' => 'index')); ?>">
            <i class="fa fa-chevron-left icone"></i>  Retour
        </a>
    </div>
    <div class="col-md-12 page_body">

        <?= $this->Form->create($user) ?>
        <fieldset>
        <?php
            echo $this->Form->control('fname',['class'=>'form-control','label'=>'Nom']);
            echo $this->Form->control('lname',['class'=>'form-control','label'=>'Prénom']);
            echo $this->Form->control('email',['class'=>'form-control']);
            echo $this->Form->control('password',['class'=>'form-control']);
            echo $this->Form->control('adresse',['class'=>'form-control']);
            echo $this->Form->control('telephone',['class'=>'form-control']);
        ?>
        </fieldset>
        <?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-primary btn-sm btn-titre btn-submit']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
