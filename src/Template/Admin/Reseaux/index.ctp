<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reseau[]|\Cake\Collection\CollectionInterface
 */
$this->assign('title', 'Liste des reseaux');
$this->extend('/Cell/Admin/reseau/liste');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reseau'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reseaux index large-9 medium-8 columns content">
    <h3><?= __('Reseaux') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom')?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lien') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reseaux as $reseau): ?>
            <tr>
                <td><?= $this->Number->format($reseau->id) ?></td>
                <td><?= h($reseau->nom) ?></td>
                <td><?= h($reseau->logo) ?></td>
                <td><?= h($reseau->lien) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reseau->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
