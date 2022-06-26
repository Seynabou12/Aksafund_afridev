<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parametre $parametre
 */
$this->assign('title', 'Modifier - parametre');
$this->assign('view', 'edit');
$this->assign('action', $this->Url->build(['action' => 'edit', $parametre->id]));
$this->extend('/Cell/Admin/parametre/ajout'); ?>
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $parametre->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $parametre->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parametres'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="parametres form large-9 medium-8 columns content">
    <?= $this->Form->create($parametre) ?>
    <fieldset>
        <legend><?= __('Edit Parametre') ?></legend>
        <?php
            echo $this->Form->control('nomPlateforme');
            echo $this->Form->control('email');
            echo $this->Form->control('telephone');
            echo $this->Form->control('adresse');
            echo $this->Form->control('code_postal');
            echo $this->Form->control('ville');
            echo $this->Form->control('pays');
            echo $this->Form->control('logo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
