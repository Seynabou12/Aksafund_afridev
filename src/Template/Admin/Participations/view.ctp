<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participation $participation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Participation'), ['action' => 'edit', $participation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Participation'), ['action' => 'delete', $participation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Participations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campagnes'), ['controller' => 'Campagnes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campagne'), ['controller' => 'Campagnes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="participations view large-9 medium-8 columns content">
    <h3><?= h($participation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Etatpaiement') ?></th>
            <td><?= h($participation->etatpaiement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($participation->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participant') ?></th>
            <td><?= $participation->has('participant') ? $this->Html->link($participation->participant->id, ['controller' => 'Participants', 'action' => 'view', $participation->participant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campagne') ?></th>
            <td><?= $participation->has('campagne') ? $this->Html->link($participation->campagne->name, ['controller' => 'Campagnes', 'action' => 'view', $participation->campagne->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($participation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Montant') ?></th>
            <td><?= $this->Number->format($participation->montant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Anonyme') ?></th>
            <td><?= $this->Number->format($participation->anonyme) ?></td>
        </tr>
    </table>
</div>
