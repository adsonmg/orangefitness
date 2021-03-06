<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Degree'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="degrees index large-9 medium-8 columns content">
    <h3><?= __('Degrees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('instituition') ?></th>
                <th><?= $this->Paginator->sort('course') ?></th>
                <th><?= $this->Paginator->sort('duration') ?></th>
                <th><?= $this->Paginator->sort('trainers_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($degrees as $degree): ?>
            <tr>
                <td><?= $this->Number->format($degree->id) ?></td>
                <td><?= h($degree->instituition) ?></td>
                <td><?= h($degree->course) ?></td>
                <td><?= h($degree->duration) ?></td>
                <td><?= $degree->has('trainer') ? $this->Html->link($degree->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $degree->trainer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $degree->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $degree->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $degree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $degree->id)]) ?>
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
