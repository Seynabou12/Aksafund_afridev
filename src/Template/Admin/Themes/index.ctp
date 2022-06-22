<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Typecategory[]|\Cake\Collection\CollectionInterface $typecategorys
 */
$this->assign('title', 'Liste des themes');
$this->extend('/Cell/Admin/type/liste');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Theme'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="themes index large-9 medium-8 columns content">
    <h3><?= __('Themes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idTheme') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nomTheme') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($themes as $theme): ?>
            <tr>
                <td><?= $this->Number->format($theme->idTheme) ?></td>
                <td><?= h($theme->nomTheme) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $theme->idTheme]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
