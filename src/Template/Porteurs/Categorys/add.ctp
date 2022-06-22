<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
$this->assign('title', 'Ajout - Nouvelle catégorie');
    $this->assign('view', 'action');
    $this->assign('action', $this->Url->build(['action' => 'add']));
    $this->extend('/Cell/Admin/categorie/ajout'); ?>
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Typecategorys'), ['controller' => 'Typecategorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Typecategory'), ['controller' => 'Typecategorys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Campagnes'), ['controller' => 'Campagnes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campagne'), ['controller' => 'Campagnes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorys form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Add Category') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('status');
            echo $this->Form->control('icone');
            echo $this->Form->control('typecategorys_id', ['options' => $typecategorys]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
