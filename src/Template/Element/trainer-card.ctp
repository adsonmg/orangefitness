<div class="trainer-card">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="foto centered">
                <?= $this->Html->image($trainer_image, ['class'=>'foto-profile img-circle']); ?>
            </div>
            <p class="trainer-views">
                <span style="font-weight: 600">                 
                    <?= $trainer_views ?>
                 </span> 
                </br>
                visualizações
            </p>
            <p class="trainer-specialty">
                <?= $trainer_specialty ?>
            </p>
        </div>
        <div class="col-md-8">
            <h4 class="trainer-name"><?= $trainer_name ?></h4>
            <h5><?= $trainer_location ?></h5>
            <h5 class="sub-title"><?= $trainer_bio ?>
            </h5>      
            <a href="#" class="btn btn-conf-2 btn-input btn-trainer" role="Button">Ver perfil</a> 
        </div>
    </div>
</div>