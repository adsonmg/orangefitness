<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Telephones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="telephones form large-9 medium-8 columns content">
    <?= $this->Form->create($telephone) ?>
    <fieldset>
        <legend><?= __('Add Telephone') ?></legend>
        <?php
            echo $this->Form->input('trainers_id', ['options' => $trainers]);
            echo $this->Form->input('telephone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
