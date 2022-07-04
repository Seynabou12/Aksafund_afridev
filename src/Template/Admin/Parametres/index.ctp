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
        <li><?= $this->Html->link(__('List Reseaux'), ['controller' => 'Reseaux', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reseau'), ['controller' => 'Reseaux', 'action' => 'add']) ?></li>
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
                <th scope="col"><?= $this->Paginator->sort('reseau_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametres as $parametre): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parametre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parametre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parametre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parametre->id)]) ?>
                
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
