<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trainer'), ['action' => 'edit', $trainer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trainer'), ['action' => 'delete', $trainer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trainers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trainer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specialties'), ['controller' => 'Specialties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialty'), ['controller' => 'Specialties', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trainers view large-9 medium-8 columns content">
    <h3><?= h($trainer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $trainer->has('user') ? $this->Html->link($trainer->user->name, ['controller' => 'Users', 'action' => 'view', $trainer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Bio') ?></th>
            <td><?= h($trainer->bio) ?></td>
        </tr>
        <tr>
            <th><?= __('CREF') ?></th>
            <td><?= h($trainer->CREF) ?></td>
        </tr>
        <tr>
            <th><?= __('Url') ?></th>
            <td><?= h($trainer->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($trainer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Type Of Section') ?></th>
            <td><?= $this->Number->format($trainer->type_of_section) ?></td>
        </tr>
        <tr>
            <th><?= __('Rating') ?></th>
            <td><?= $this->Number->format($trainer->rating) ?></td>
        </tr>
        <tr>
            <th><?= __('Rating Count Votes') ?></th>
            <td><?= $this->Number->format($trainer->rating_count_votes) ?></td>
        </tr>
        <tr>
            <th><?= __('Average Price') ?></th>
            <td><?= $this->Number->format($trainer->average_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Years Training') ?></th>
            <td><?= $this->Number->format($trainer->years_training) ?></td>
        </tr>
        <tr>
            <th><?= __('Number Views') ?></th>
            <td><?= $this->Number->format($trainer->number_views) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Specialties') ?></h4>
        <?php if (!empty($trainer->specialties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Filter Category') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trainer->specialties as $specialties): ?>
            <tr>
                <td><?= h($specialties->id) ?></td>
                <td><?= h($specialties->name) ?></td>
                <td><?= h($specialties->description) ?></td>
                <td><?= h($specialties->filter_category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Specialties', 'action' => 'view', $specialties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Specialties', 'action' => 'edit', $specialties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Specialties', 'action' => 'delete', $specialties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
