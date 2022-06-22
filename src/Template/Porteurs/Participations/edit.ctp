<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participation $participation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $participation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $participation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Participations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Campagnes'), ['controller' => 'Campagnes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campagne'), ['controller' => 'Campagnes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="participations form large-9 medium-8 columns content">
    <?= $this->Form->create($participation) ?>
    <fieldset>
        <legend><?= __('Edit Participation') ?></legend>
        <?php
            echo $this->Form->control('montant');
            echo $this->Form->control('etatpaiement');
            echo $this->Form->control('status');
            echo $this->Form->control('anonyme');
            echo $this->Form->control('participant_id', ['options' => $participants]);
            echo $this->Form->control('campagne_id', ['options' => $campagnes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
