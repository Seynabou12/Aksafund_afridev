<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slider
 */
$this->assign('title', 'Ajout - Nouvelle slider');
    $this->assign('view', 'action');
    $this->assign('action', $this->Url->build(['action' => 'add']));
    $this->extend('/Cell/Admin/slider/ajout'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sections form large-9 medium-8 columns content">
    <?= $this->Form->create($slider ,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Slider') ?></legend>
        <?php
            echo $this->Form->control('titre');
            echo $this->Form->control('description');
            echo $this->Form->control('images',['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
