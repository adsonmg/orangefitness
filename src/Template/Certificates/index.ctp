<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Certificate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="certificates index large-9 medium-8 columns content">
    <h3><?= __('Certificates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('trainers_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('image') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($certificates as $certificate): ?>
            <tr>
                <td><?= $this->Number->format($certificate->id) ?></td>
                <td><?= $certificate->has('trainer') ? $this->Html->link($certificate->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $certificate->trainer->id]) : '' ?></td>
                <td><?= h($certificate->title) ?></td>
                <td><?= h($certificate->description) ?></td>
                <td><?= h($certificate->image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $certificate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $certificate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $certificate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificate->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
