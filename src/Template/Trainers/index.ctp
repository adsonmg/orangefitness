<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trainer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specialties'), ['controller' => 'Specialties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialty'), ['controller' => 'Specialties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trainers index large-9 medium-8 columns content">
    <h3><?= __('Trainers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('users_id') ?></th>
                <th><?= $this->Paginator->sort('type_of_section') ?></th>
                <th><?= $this->Paginator->sort('bio') ?></th>
                <th><?= $this->Paginator->sort('rating') ?></th>
                <th><?= $this->Paginator->sort('rating_count_votes') ?></th>
                <th><?= $this->Paginator->sort('average_price') ?></th>
                <th><?= $this->Paginator->sort('CREF') ?></th>
                <th><?= $this->Paginator->sort('years_training') ?></th>
                <th><?= $this->Paginator->sort('url') ?></th>
                <th><?= $this->Paginator->sort('number_views') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainers as $trainer): ?>
            <tr>
                <td><?= $this->Number->format($trainer->id) ?></td>
                <td><?= $trainer->has('user') ? $this->Html->link($trainer->user->name, ['controller' => 'Users', 'action' => 'view', $trainer->user->id]) : '' ?></td>
                <td><?= $this->Number->format($trainer->type_of_section) ?></td>
                <td><?= h($trainer->bio) ?></td>
                <td><?= $this->Number->format($trainer->rating) ?></td>
                <td><?= $this->Number->format($trainer->rating_count_votes) ?></td>
                <td><?= $this->Number->format($trainer->average_price) ?></td>
                <td><?= h($trainer->CREF) ?></td>
                <td><?= $this->Number->format($trainer->years_training) ?></td>
                <td><?= h($trainer->url) ?></td>
                <td><?= $this->Number->format($trainer->number_views) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trainer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trainer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trainer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainer->id)]) ?>
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
