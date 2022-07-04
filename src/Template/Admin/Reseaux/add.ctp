<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reseau $reseau
 */
$this->assign('title', 'Ajout - Nouveau Reseau');
    $this->assign('view', 'action');
    $this->assign('action', $this->Url->build(['action' => 'add']));
    $this->extend('/Cell/Admin/reseau/ajout'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reseaux'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="themes form large-9 medium-8 columns content">
    <?= $this->Form->create($reseau , ['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Reseau') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('logo', ['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
