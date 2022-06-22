<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fichier $fichier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fichier'), ['action' => 'edit', $fichier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fichier'), ['action' => 'delete', $fichier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fichiers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fichier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campagnes'), ['controller' => 'Campagnes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campagne'), ['controller' => 'Campagnes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fichiers view large-9 medium-8 columns content">
    <h3><?= h($fichier->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($fichier->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campagne') ?></th>
            <td><?= $fichier->has('campagne') ? $this->Html->link($fichier->campagne->name, ['controller' => 'Campagnes', 'action' => 'view', $fichier->campagne->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fichier->id) ?></td>
        </tr>
    </table>
</div>
