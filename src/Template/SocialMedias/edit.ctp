<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $socialMedia->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $socialMedia->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Social Medias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trainers'), ['controller' => 'Trainers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trainer'), ['controller' => 'Trainers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="socialMedias form large-9 medium-8 columns content">
    <?= $this->Form->create($socialMedia) ?>
    <fieldset>
        <legend><?= __('Edit Social Media') ?></legend>
        <?php
            echo $this->Form->input('facebook');
            echo $this->Form->input('twitter');
            echo $this->Form->input('linkedin');
            echo $this->Form->input('youtube');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
