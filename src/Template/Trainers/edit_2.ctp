<script>
    $(document).ready(function () {
        //Location Form submit
        $("#form-location").submit(function (event) {

            //Get fomr data
            var data = $(this).serialize();

            //Create a post request
            var request = $.post('<?php
            echo $this->Url->build([
                'controller' => 'Locations',
                'action' => 'add'
            ]);
            ?>',
            data);

            //Get request response
            request.done(function (response) {
                var obj = jQuery.parseJSON(response);
                $("#locations").append('<div class="form large-12 medium-12" class="location_name" id="' + obj.id + '" >' + obj.location + "</div>");

            })
            .fail(function () {
                alert("error");
            });
            return false;

        });
        
        //Location Edit
        //source: http://jsfiddle.net/Lf2v2rbd/1/
        $(document).on('click', '.location_name', function(e){
            var curName = $(this).text();
            var curId = $(this).attr('id');
            $(this).replaceWith('<input type="text" curId="'+ curId +'" id="location-name-input" value="'+ curName +'" />');
        });
        
        $(document).on('blur keyup', '#location-name-input', function(e){
            var thisElement = this;
            if(e.keyCode === 13 || e.type === 'focusout'){
                var newName = $(this).val();
                var elemId = $(this).attr('curId');
                //Create a post request
                var requestEdit = $.post('<?= $this->Url->build(['controller' => 'Locations', 'action' => 'edit']);
                ?>',
                { 
                    'id': elemId, 
                    'location': newName // <-- the $ sign in the parameter name seems unusual, I would avoid it
                });

                //Get request response
                requestEdit.done(function (response) {
                    alert(response);
                    $(thisElement).replaceWith('<div class="form large-12 medium-12 location_name" id="'+elemId+'">' + newName + "</div>");
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("error");
                });
            }
            //Use ajax to save changes
            return false;
        });
        
    });
</script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?=
            $this->Form->postLink(
                    __('Delete'), ['action' => 'delete', $trainer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainer->id)]
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
            'options' => $specialties,
            'type' => 'select',
            'multiple' => 'checkbox',
            'label' => false,
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
                    <td><?=
                        $degree->has('trainer') ? $this->Html->link($degree->trainer->id, ['controller' => 'Trainers',
                                    'action' => 'view',
                                    $degree->trainer->id]) : ''
                        ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $degree->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $degree->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $degree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $degree->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?=
    $this->Form->create(null, [
        'url' => ['controller' => 'Degrees', 'action' => 'add']
    ])
    ?>
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
    <div class="trainers form large-12 medium-12 columns content" id="locations">
        <?php foreach ($trainer->locations as $location): ?>
            <div class="form large-12 medium-12 location_name" id="<?= h($location->id) ?>" ><?= h($location->location) ?></div>
        <?php endforeach; ?>
    </div>
    <div class="trainers form large-12 medium-12 columns content">
        <?=
        $this->Form->create(null, [
            'id' => 'form-location',
        ])
        ?>
        <fieldset>
            <legend><?= __('Add Location') ?></legend>
            <?php
            echo $this->Form->input('location');
            echo $this->Form->hidden('trainers_id', ['value' => $trainer->id]);
            ?>
        </fieldset>
        <?=
        $this->Form->button(__('Submit'), [
            'id' => 'submit-location'
        ])
        ?>
        <?= $this->Form->end() ?>
    </div>
</div>
