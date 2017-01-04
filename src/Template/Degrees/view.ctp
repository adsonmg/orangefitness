<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Degree'), ['action' => 'edit', $degree->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Degree'), ['action' => 'delete', $degree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $degree->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Degrees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Degree'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="degrees view large-9 medium-8 columns content">
    <h3><?= h($degree->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Instituition') ?></th>
            <td><?= h($degree->instituition) ?></td>
        </tr>
        <tr>
            <th><?= __('Course') ?></th>
            <td><?= h($degree->course) ?></td>
        </tr>
        <tr>
            <th><?= __('Duration') ?></th>
            <td><?= h($degree->duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Trainer') ?></th>
            <td><?= $degree->has('trainer') ? $this->Html->link($degree->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $degree->trainer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($degree->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($degree->description)); ?>
    </div>
</div>
