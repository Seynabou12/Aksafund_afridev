<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parametre[]|\Cake\Collection\CollectionInterface $parametres
 */
$this->assign('title', 'Liste des parametres');
$this->extend('/Cell/Admin/parametre/liste');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Parametre'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parametres index large-9 medium-8 columns content">
    <h3><?= __('Parametres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nomPlateforme') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adresse') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code_postal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ville') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pays') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
              
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametres as $parametre): ?>
            <tr>
                <td><?= $this->Number->format($parametre->id) ?></td>
                <td><?= h($parametre->nomPlateforme) ?></td>
                <td><?= h($parametre->email) ?></td>
                <td><?= h($parametre->adresse) ?></td>
                <td><?= h($parametre->telephone) ?></td>
                <td><?= h($parametre->code_postal) ?></td>
                <td><?= h($parametre->ville) ?></td>
                <td><?= h($parametre->pays) ?></td>
                <td><?= h($parametre->logo) ?></td>
               
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parametre->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
