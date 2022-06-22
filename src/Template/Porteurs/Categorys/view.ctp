<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Typecategorys'), ['controller' => 'Typecategorys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Typecategory'), ['controller' => 'Typecategorys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campagnes'), ['controller' => 'Campagnes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campagne'), ['controller' => 'Campagnes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorys view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($category->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icone') ?></th>
            <td><?= h($category->icone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Typecategory') ?></th>
            <td><?= $category->has('typecategory') ? $this->Html->link($category->typecategory->name, ['controller' => 'Typecategorys', 'action' => 'view', $category->typecategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Campagnes') ?></h4>
        <?php if (!empty($category->campagnes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Desc Courte') ?></th>
                <th scope="col"><?= __('Desc Longue') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Lien') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Montant') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->campagnes as $campagnes): ?>
            <tr>
                <td><?= h($campagnes->id) ?></td>
                <td><?= h($campagnes->name) ?></td>
                <td><?= h($campagnes->desc_courte) ?></td>
                <td><?= h($campagnes->desc_longue) ?></td>
                <td><?= h($campagnes->created) ?></td>
                <td><?= h($campagnes->lien) ?></td>
                <td><?= h($campagnes->status) ?></td>
                <td><?= h($campagnes->montant) ?></td>
                <td><?= h($campagnes->category_id) ?></td>
                <td><?= h($campagnes->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Campagnes', 'action' => 'view', $campagnes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Campagnes', 'action' => 'edit', $campagnes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Campagnes', 'action' => 'delete', $campagnes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campagnes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
