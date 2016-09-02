<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Specialty'), ['action' => 'edit', $specialty->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Specialty'), ['action' => 'delete', $specialty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialty->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Specialties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialty'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="specialties view large-9 medium-8 columns content">
    <h3><?= h($specialty->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($specialty->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($specialty->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($specialty->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Filter Category') ?></th>
            <td><?= $this->Number->format($specialty->filter_category) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Trainers') ?></h4>
        <?php if (!empty($specialty->trainers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Users Id') ?></th>
                <th><?= __('Type Of Section') ?></th>
                <th><?= __('Bio') ?></th>
                <th><?= __('Rating') ?></th>
                <th><?= __('Rating Count Votes') ?></th>
                <th><?= __('Average Price') ?></th>
                <th><?= __('CREF') ?></th>
                <th><?= __('Years Training') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Number Views') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($specialty->trainers as $trainers): ?>
            <tr>
                <td><?= h($trainers->id) ?></td>
                <td><?= h($trainers->users_id) ?></td>
                <td><?= h($trainers->type_of_section) ?></td>
                <td><?= h($trainers->bio) ?></td>
                <td><?= h($trainers->rating) ?></td>
                <td><?= h($trainers->rating_count_votes) ?></td>
                <td><?= h($trainers->average_price) ?></td>
                <td><?= h($trainers->CREF) ?></td>
                <td><?= h($trainers->years_training) ?></td>
                <td><?= h($trainers->url) ?></td>
                <td><?= h($trainers->number_views) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trainers', 'action' => 'view', $trainers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trainers', 'action' => 'edit', $trainers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trainers', 'action' => 'delete', $trainers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
