<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Telephone'), ['action' => 'edit', $telephone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Telephone'), ['action' => 'delete', $telephone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Telephones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Telephone'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="telephones view large-9 medium-8 columns content">
    <h3><?= h($telephone->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Trainer') ?></th>
            <td><?= $telephone->has('trainer') ? $this->Html->link($telephone->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $telephone->trainer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Telephone') ?></th>
            <td><?= h($telephone->telephone) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($telephone->id) ?></td>
        </tr>
    </table>
</div>
