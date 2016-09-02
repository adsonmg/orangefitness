<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Trainers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specialties'), ['controller' => 'Specialties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialty'), ['controller' => 'Specialties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trainers form large-9 medium-8 columns content">
    <?= $this->Form->create($trainer) ?>
    <fieldset>
        <legend><?= __('Add Trainer') ?></legend>
        <?php
            echo $this->Form->input('type_of_section');
            echo $this->Form->input('bio', ['type' => 'textarea', 'escape' => false]);
            echo $this->Form->input('CREF');
            echo $this->Form->input('years_training');
            echo $this->Form->input('url');
            //echo $this->Form->input('specialties._ids', ['options' => $specialties]);
            echo $this->Form->input('specialties._ids', [
                                'multiple' => 'checkbox',
                                'options' => $specialties
                            ]);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
