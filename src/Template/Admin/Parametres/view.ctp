<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parametre $parametre
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Parametres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parametre'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parametres view large-9 medium-8 columns content">
    <h3><?= h($parametre->nomPlateforme) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom de la Plateforme') ?></th>
            <td><?= h($parametre->nomPlateforme) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($parametre->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($parametre->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adresse') ?></th>
            <td><?= h($parametre->adresse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CodePostal') ?></th>
            <td><?= h($parametre->code_postal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ville') ?></th>
            <td><?= h($parametre->ville) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pays') ?></th>
            <td><?= h($parametre->pays) ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($parametre->id) ?></td>
        </tr>
    </table>
</div>
