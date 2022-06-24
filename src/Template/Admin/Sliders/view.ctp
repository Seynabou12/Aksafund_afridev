<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Section'), ['action' => 'edit', $slider->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Slider'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add']) ?> </li>
</nav>
<div class="sections view large-9 medium-8 columns content">
    <h3><?= h($slider->titre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($slider->titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($slider->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Images') ?></th>
            <td><?= h($slider->images) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($slider->id) ?></td>
        </tr>
    </table>
</div>
