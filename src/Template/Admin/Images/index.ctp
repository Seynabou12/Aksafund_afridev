<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Images[]|\Cake\Collection\CollectionInterface $images
 */
$this->assign('title', 'Liste des Images');
$this->extend('/Cell/Admin/image/liste');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="images index large-9 medium-8 columns content">
    <h3><?= __('Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($images as $image): ?>
            <tr>
                <td><?= $this->Number->format($image->id) ?></td>
                <td><?= h($image->image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $image->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
