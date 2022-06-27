<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slider
 */
$this->assign('title', 'Modifier - slider');
$this->assign('view', 'edit');
$this->assign('action', $this->Url->build(['action' => 'edit', $slider->id]));
$this->extend('/Cell/Admin/slider/ajout'); ?>
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $slider->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sliders form large-9 medium-8 columns content">
    <?= $this->Form->create($slider) ?>
    <fieldset>
        <legend><?= __('Edit Slider') ?></legend>
        <?php
            echo $this->Form->control('titre');
            echo $this->Form->control('description');
            echo $this->Form->control('images',['type'=>'file']);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
