<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categorys
 */
$this->assign('title', 'Liste des catégories');
$this->extend('/Cell/Admin/categorie/liste');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Typecategorys'), ['controller' => 'Typecategorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Typecategory'), ['controller' => 'Typecategorys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Campagnes'), ['controller' => 'Campagnes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campagne'), ['controller' => 'Campagnes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorys index large-9 medium-8 columns content">
    <h3><?= __('Categorys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('icone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('typecategorys_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorys as $category): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
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
