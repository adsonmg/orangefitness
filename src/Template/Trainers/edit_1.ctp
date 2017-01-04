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
                                'multiple' => 'checkbox',
                                'options' => $specialties
                            ]);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    
    
    
    <div class="related">
        <h4><?= __('Social Media') ?></h4>
        <?php if (!empty($trainer->social_media)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Facebook') ?></th>
                <th><?= __('Twitter') ?></th>
                <th><?= __('Linkedin') ?></th>
                <th><?= __('YouTube') ?></th>
                <th><?= __('Email') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            
            <tr>
                <td><?= h($trainer->social_media->id) ?></td>
                <td><?= h($trainer->social_media->facebook) ?></td>
                <td><?= h($trainer->social_media->twitter) ?></td>
                <td><?= h($trainer->social_media->linkedin) ?></td>
                <td><?= h($trainer->social_media->youtube) ?></td>
                <td><?= h($trainer->social_media->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller'=> 'SocialMedias', 'action' => 'edit', $trainer->social_media->id]) ?>
                </td>
            </tr>
            
            
        </table>
        
        <?php endif; ?>
     </div>
    
    <div class="related">
        <h4><?= __('Telephones') ?></h4>
        <?php if (!empty($trainer->telephones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Telephone') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trainer->telephones as $telephones): ?>
            <tr>
                <td><?= h($telephones->id) ?></td>
                <td><?= h($telephones->telephone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Telephones', 'action' => 'edit', $telephones->id]) ?>
                    <?= $this->Form->postLink(
                            __('Delete'),
                            ['controller' => 'Telephones', 'action' => 'delete', $telephones->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $telephones->id)]
                        )
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?= $this->Html->link(__('Add Telephones'), ['controller' => 'Telephones', 'action' => 'add']) ?>
    </div>
    
     <div class="related">
        <h4><?= __('Certificates') ?></h4>
        <?php if (!empty($trainer->certificates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Descritpion') ?></th>
                <th><?= __('Image') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trainer->certificates as $certificates): ?>
            <tr>
                <td><?= h($certificates->id) ?></td>
                <td><?= h($certificates->title) ?></td>
                <td><?= h($certificates->description) ?></td>
                <td><?= h($certificates->image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Certificates', 'action' => 'edit', $certificates->id]) ?>
                    <?= $this->Form->postLink(
                            __('Delete'),
                            ['controller' => 'Certificates', 'action' => 'delete', $certificates->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $certificates->id)]
                        )
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?= $this->Html->link(__('Add Certificates'), ['controller' => 'Certificates', 'action' => 'add']) ?>
    </div>
    
    <div class="related">
        <h4><?= __('Articles') ?></h4>
        <?php if (!empty($trainer->articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trainer->articles as $articles): ?>
            <tr>
                <td><?= h($articles->id) ?></td>
                <td><?= h($articles->title) ?></td>
                <td><?= h($articles->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>
                    <?= $this->Form->postLink(
                            __('Delete'),
                            ['controller' => 'Articles', 'action' => 'delete', $articles->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]
                        )
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?= $this->Html->link(__('Add Articles'), ['controller' => 'Articles', 'action' => 'add']) ?>
    </div>
    
</div>