<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Typecategory $typecategory
 */
$this->assign('title', 'Ajout - Nouveau Type');
    $this->assign('view', 'action');
    $this->assign('action', $this->Url->build(['action' => 'add']));
    $this->extend('/Cell/Admin/type/ajout'); ?>
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Typecategorys'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="typecategorys form large-9 medium-8 columns content">
    <?= $this->Form->create($typecategory) ?>
    <fieldset>
        <legend><?= __('Add Typecategory') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
