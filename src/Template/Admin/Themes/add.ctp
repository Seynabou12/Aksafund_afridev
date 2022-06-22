<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Theme $theme
 */
$this->assign('title', 'Ajout - Nouveau Theme');
    $this->assign('view', 'action');
    $this->assign('action', $this->Url->build(['action' => 'add']));
    $this->extend('/Cell/Admin/theme/ajout'); ?>
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="themes form large-9 medium-8 columns content">
    <?= $this->Form->create($theme) ?>
    <fieldset>
        <legend><?= __('Add Theme') ?></legend>
        <?php
            echo $this->Form->control('nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
