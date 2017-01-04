<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trainer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trainer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trainers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specialties'), ['controller' => 'Specialties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialty'), ['controller' => 'Specialties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="trainers form large-9 medium-8 columns content">
    <?= $this->Form->create($trainer) ?>
    <fieldset>
        <legend><?= __('Edit Trainer') ?></legend>
        <?php
            echo $this->Form->input('type_of_section');
            echo $this->Form->input('bio', ['type' => 'textarea', 'escape' => false]);
            echo $this->Form->input('CREF');
            echo $this->Form->input('years_training');
            echo $this->Form->input('url');           
            //echo $this->Form->input('specialties._ids', ['options' => $specialties]);
            echo $this->Form->input('specialties._ids', [   
                        'templates' => [ 
                            'checkboxWrapper' => '<div class="large-3 medium-4 columns">{{label}}</div>',
                        ],
                        'options'  => $specialties,
                        'type'     => 'select',
                        'multiple' => 'checkbox',
                        'label'    => false,
                        ]);
                      
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    
</div>
 
<div class="trainers form large-9 medium-8 columns content">
    <h3><?= __('Degrees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('instituition') ?></th>
                <th><?= $this->Paginator->sort('course') ?></th>
                <th><?= $this->Paginator->sort('duration') ?></th>
                <th><?= $this->Paginator->sort('trainers_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainer->degrees as $degree): ?>
            <tr>
                <td><?= $this->Number->format($degree->id) ?></td>
                <td><?= h($degree->instituition) ?></td>
                <td><?= h($degree->course) ?></td>
                <td><?= h($degree->duration) ?></td>
                <td><?= $degree->has('trainer') ? $this->Html->link($degree->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $degree->trainer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $degree->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $degree->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $degree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $degree->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'Degrees', 'action' => 'add']
    ]) ?>
    <fieldset>
        <legend><?= __('Add Degree') ?></legend>
        <?php
            echo $this->Form->input('instituition');
            echo $this->Form->input('course');
            echo $this->Form->input('duration');
            echo $this->Form->input('description');
            echo $this->Form->hidden('trainers_id', ['value' => $trainer->id]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

    <br />
    <h3><?= __('Locations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('location') ?></th>
                <th><?= $this->Paginator->sort('trainers_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainer->locations as $location): ?>
            <tr>
                <td><?= $this->Number->format($location->id) ?></td>
                <td><?= h($location->location) ?></td>
                <td><?= $location->has('trainer') ? $this->Html->link($location->trainer->id, ['controller' => 'Trainers', 'action' => 'view', $location->trainer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $location->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Form->create(null,[
        'url' => ['controller' => 'Locations', 'action' => 'add']
    ]) ?>
    <fieldset>
        <legend><?= __('Add Location') ?></legend>
        <?php
            echo $this->Form->input('location');
            echo $this->Form->hidden('trainers_id', ['value' => $trainer->id]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
