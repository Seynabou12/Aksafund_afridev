<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parametre $parametre
 */
$this->assign('title', 'Ajout - Nouveau parametre');
    $this->assign('view', 'action');
    $this->assign('action', $this->Url->build(['action' => 'add']));
    $this->extend('/Cell/Admin/parametre/ajout'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Parametres'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reseaux'), ['controller' => 'Reseaux', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reseau'), ['controller' => 'Reseaux', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parametres form large-9 medium-8 columns content">
    <?= $this->Form->create($parametre,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Parametre') ?></legend>
        <?php
            echo $this->Form->control('nomPlateforme');
            echo $this->Form->control('email');
            echo $this->Form->control('telephone');
            echo $this->Form->control('adresse');
            echo $this->Form->control('code_postal');
            echo $this->Form->control('ville');
            echo $this->Form->control('pays');
            echo $this->Form->control('logo', ['type'=>'file']);
            echo $this->Form->control('reseau_id', ['options' => $reseaux]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
