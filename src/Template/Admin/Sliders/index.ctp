<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider[]|\Cake\Collection\CollectionInterface $sections
 */
$this->assign('title', 'Liste des sliders');
$this->extend('/Cell/Admin/slider/liste');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add']) ?></li>
        
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sections index large-9 medium-8 columns content">
    <h3><?= __('Sliders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('images') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_section') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sliders as $slider): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $slider->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $slider->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
</div>
