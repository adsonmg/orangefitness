<div class="trainer-card">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="foto centered">
                <?= $this->element('profile-picture',[
                                    'img_porfile' => $trainer->user->picture
                                ]); ?>
            </div>
            <p class="trainer-views">
                <span style="font-weight: 600">                 
                    <?= $trainer->user->city->name.','.$trainer->user->state->uf ?>
                 </span> 
                </br>
                visualizações
            </p>
        </div>
        <div class="col-md-8">
            <h4 class="trainer-name"><?= $trainer->user->name ?></h4>
            <h5><?php ?></h5>
            <h5 class="sub-title"><?= $trainer->bio ?>
            </h5>      
            <p class="trainer-specialty">
                <?php foreach ($trainer->specialties as $specialty): ?>
                    <div class="label label-specialties"><?= h($specialty->name) ?></div>
                <?php endforeach; ?>
            </p>
            <?php
                echo $this->Html->link(
                    'Ver perfil',
                    [   'controller' => 'Trainers',
                        'action' => 'view',
                        $trainer->id],
                    [
                        'class' => 'btn btn-conf-2 btn-input btn-trainer'
                    ]
                );
            ?>
        </div>
    </div>
</div>