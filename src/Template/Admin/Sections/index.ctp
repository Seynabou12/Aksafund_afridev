<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Section[]|\Cake\Collection\CollectionInterface $sections
 */
$this->assign('title', 'Liste des sections');
$this->extend('/Cell/Admin/section/liste');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Section'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Theme', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sections index large-9 medium-8 columns content">
    <h3><?= __('Sections') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('texte') ?></th>
                <th scope="col"><?= $this->Paginator->sort('theme_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sections as $section): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $section->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $section->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
</div>
