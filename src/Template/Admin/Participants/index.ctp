<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participant[]|\Cake\Collection\CollectionInterface $participants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Participant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participations'), ['controller' => 'Participations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participation'), ['controller' => 'Participations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="participants index large-9 medium-8 columns content">
    <h3><?= __('Participants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lname') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participants as $participant): ?>
            <tr>
                <td><?= $this->Number->format($participant->id) ?></td>
                <td><?= h($participant->status) ?></td>
                <td><?= $participant->has('user') ? $this->Html->link($participant->user->id, ['controller' => 'Users', 'action' => 'view', $participant->user->id]) : '' ?></td>
                <td><?= h($participant->fname) ?></td>
                <td><?= h($participant->lname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $participant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $participant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $participant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participant->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
