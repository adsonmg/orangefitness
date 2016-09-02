<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Certificate'), ['action' => 'edit', $certificate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Certificate'), ['action' => 'delete', $certificate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Certificates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="certificates view large-9 medium-8 columns content">
    <h3><?= h($certificate->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Trainer') ?></th>
            <td><?= $certificate->has('trainer') ? $this->Html->link($certificate->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $certificate->trainer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($certificate->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($certificate->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($certificate->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($certificate->id) ?></td>
        </tr>
    </table>
</div>
