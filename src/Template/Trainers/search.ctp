 <?php           debug($trainers); ?>
<div class="trainers index large-9 medium-8 columns content">
    <h3><?= __('Trainers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('users_id') ?></th>
                <th><?= $this->Paginator->sort('bio') ?></th>
                <th><?= $this->Paginator->sort('years_training') ?></th>
                <th><?= $this->Paginator->sort('specialties') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainers as $trainer): ?>
            <tr>
                <td><?= $this->Number->format($trainer->id) ?></td>
                <td><?= $trainer->has('user') ? $this->Html->link($trainer->user->name, ['controller' => 'Users', 'action' => 'view', $trainer->user->id]) : '' ?></td>
                <td><?= h($trainer->bio) ?></td>
                <td><?= $this->Number->format($trainer->years_training) ?></td>
                <td><?php
                        foreach ($trainer->specialties as $specialty){
                            echo $specialty->name.'<br/>';
                            
                        }
                    ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trainer->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>