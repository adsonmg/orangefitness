<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Social Media'), ['action' => 'edit', $socialMedia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Social Media'), ['action' => 'delete', $socialMedia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Social Medias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Social Media'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="socialMedias view large-9 medium-8 columns content">
    <h3><?= h($socialMedia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Facebook') ?></th>
            <td><?= h($socialMedia->facebook) ?></td>
        </tr>
        <tr>
            <th><?= __('Twitter') ?></th>
            <td><?= h($socialMedia->twitter) ?></td>
        </tr>
        <tr>
            <th><?= __('Linkedin') ?></th>
            <td><?= h($socialMedia->linkedin) ?></td>
        </tr>
        <tr>
            <th><?= __('Youtube') ?></th>
            <td><?= h($socialMedia->youtube) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($socialMedia->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Trainer') ?></th>
            <td><?= $socialMedia->has('trainer') ? $this->Html->link($socialMedia->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $socialMedia->trainer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($socialMedia->id) ?></td>
        </tr>
    </table>
</div>
