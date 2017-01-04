<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="degrees form large-9 medium-8 columns content">
    <?= $this->Form->create($degree) ?>
    <fieldset>
        <legend><?= __('Add Degree') ?></legend>
        <?php
            echo $this->Form->input('instituition');
            echo $this->Form->input('course');
            echo $this->Form->input('duration');
            echo $this->Form->input('description');
            echo $this->Form->input('trainers_id', ['options' => $trainers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
