<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Theme $theme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="themes view large-9 medium-8 columns content">
    <h3><?= h($theme->nomTheme) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom du Théme') ?></th>
            <td><?= h($theme->nomTheme) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($theme->idTheme) ?></td>
        </tr>
    </table>
</div>
