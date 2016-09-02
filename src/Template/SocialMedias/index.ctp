<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Social Media'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="socialMedias index large-9 medium-8 columns content">
    <h3><?= __('Social Medias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('facebook') ?></th>
                <th><?= $this->Paginator->sort('twitter') ?></th>
                <th><?= $this->Paginator->sort('linkedin') ?></th>
                <th><?= $this->Paginator->sort('youtube') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('trainers_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($socialMedias as $socialMedia): ?>
            <tr>
                <td><?= $this->Number->format($socialMedia->id) ?></td>
                <td><?= h($socialMedia->facebook) ?></td>
                <td><?= h($socialMedia->twitter) ?></td>
                <td><?= h($socialMedia->linkedin) ?></td>
                <td><?= h($socialMedia->youtube) ?></td>
                <td><?= h($socialMedia->email) ?></td>
                <td><?= $socialMedia->has('trainer') ? $this->Html->link($socialMedia->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $socialMedia->trainer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $socialMedia->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $socialMedia->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $socialMedia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedia->id)]) ?>
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
