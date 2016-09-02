<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Telephone'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="telephones index large-9 medium-8 columns content">
    <h3><?= __('Telephones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('trainers_id') ?></th>
                <th><?= $this->Paginator->sort('telephone') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($telephones as $telephone): ?>
            <tr>
                <td><?= $this->Number->format($telephone->id) ?></td>
                <td><?= $telephone->has('trainer') ? $this->Html->link($telephone->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $telephone->trainer->id]) : '' ?></td>
                <td><?= h($telephone->telephone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $telephone->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $telephone->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $telephone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephone->id)]) ?>
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
