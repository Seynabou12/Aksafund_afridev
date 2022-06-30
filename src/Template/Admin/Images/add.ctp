<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
$this->assign('title', 'Ajout - Nouvelle Image');
    $this->assign('view', 'action');
    $this->assign('action', $this->Url->build(['action' => 'add']));
    $this->extend('/Cell/Admin/image/ajout'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?></li>

        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>

    </ul>
</nav>
<div class="themes form large-9 medium-8 columns content">
    <?= $this->Form->create($image, ['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Image') ?></legend>
        <?php
            echo $this->Form->control('image', ['type'=>'file']);
            
            echo $this->Form->control('id_section', ['options' => $sections]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
