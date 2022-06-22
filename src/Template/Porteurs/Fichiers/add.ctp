<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fichier $fichier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fichiers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Campagnes'), ['controller' => 'Campagnes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campagne'), ['controller' => 'Campagnes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fichiers form large-9 medium-8 columns content">
    <?= $this->Form->create($fichier) ?>
    <fieldset>
        <legend><?= __('Add Fichier') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('campagne_id', ['options' => $campagnes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
