<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Typecategory $typecategory
 */
    $this->assign('title', 'Modifier - Type');
    $this->assign('view', 'edit');
    $this->assign('action', $this->Url->build(['action' => 'edit', $typecategorys->id]));
    $this->extend('/Cell/Admin/type/ajout'); ?>
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $typecategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $typecategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Typecategorys'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="typecategorys form large-9 medium-8 columns content">
    <?= $this->Form->create($typecategory) ?>
    <fieldset>
        <legend><?= __('Edit Typecategory') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
