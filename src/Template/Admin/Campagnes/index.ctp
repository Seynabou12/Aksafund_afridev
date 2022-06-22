<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campagne[]|\Cake\Collection\CollectionInterface $campagnes
 */
$this->assign('title', 'Liste des campagnes');
$this->extend('/Cell/Admin/campagne/liste');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Campagne'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fichiers'), ['controller' => 'Fichiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fichier'), ['controller' => 'Fichiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participations'), ['controller' => 'Participations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participation'), ['controller' => 'Participations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="campagnes index large-9 medium-8 columns content">
    <h3><?= __('Campagnes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('desc_courte') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lien') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('montant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campagnes as $campagne): ?>
            <tr>
                <td><?= $this->Number->format($campagne->id) ?></td>
                <td><?= h($campagne->name) ?></td>
                <td><?= h($campagne->desc_courte) ?></td>
                <td><?= h($campagne->created) ?></td>
                <td><?= h($campagne->lien) ?></td>
                <td><?= $this->Number->format($campagne->status) ?></td>
                <td><?= $this->Number->format($campagne->montant) ?></td>
                <td><?= $campagne->has('category') ? $this->Html->link($campagne->category->name, ['controller' => 'Categorys', 'action' => 'view', $campagne->category->id]) : '' ?></td>
                <td><?= $campagne->has('user') ? $this->Html->link($campagne->user->id, ['controller' => 'Users', 'action' => 'view', $campagne->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $campagne->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campagne->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campagne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campagne->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
