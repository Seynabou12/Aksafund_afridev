<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Typecategory $typecategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Typecategory'), ['action' => 'edit', $typecategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Typecategory'), ['action' => 'delete', $typecategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typecategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Typecategorys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Typecategory'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="typecategorys view large-9 medium-8 columns content">
    <h3><?= h($typecategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($typecategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($typecategory->id) ?></td>
        </tr>
    </table>
</div>
