<!-- Bootstrap core CSS -->
<?= $this->Html->css('bootstrap.css', ['block' => true]) ?>

<!-- Custom styles for this template -->

<?= $this->Html->css('ionicons.min.css', ['block' => true]) ?>
<?= $this->Html->css('tl-profile-style.css', ['block' => true]) ?>
<?= $this->Html->css('footer.css', ['block' => true]) ?>
<script>
$(document).ready(function(){
    $('#card-affix').affix({
        offset: {
            top: $('#card-affix').offset().top,
            
        }
      });
      
});
</script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <?= $this->Html->script('ie10-viewport-bug-workaround.js', ['block' => true]) ?>

<style>
.navbar-nav {
    float: right;
}

.search-input {
    float: none !important;
    margin-right: 0px !important;
}

.btn-conf {
    padding: 11px 28px 11px 28px !important;
}

.trainer-card{
    border-color: #d9d9d9 !important;
}
</style>
    
<!-- header -->
<?= $this->element('header'); ?>
<!-- end header -->
<?= $this->element('search-bar'); ?>

<?php //debug($trainer) ?>

<section id="content" class="sec-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div id="card-affix" class="affix" data-spy="affix">
                    <div class="row profile-card profile-inf">
                        <div class="col-md-12 text-center">
                            <div class="foto centered">
                                <?= $this->Html->image('trainer.PNG', ['class'=>'foto-profile img-circle']); ?>
                            </div>
                            <div class="col-md-12 text-center mg-top-15">
                                <h4 class="trainer-name mg-0"><?= $trainer->user->name ?></h4>
                                <p class="trainer-specialty mg-0 w400 p-inf">
                                Personal Trainer
                                </p>
                                <p class="trainer-view text-uppercase mg-0 w400 p-inf">
                                <?= "CREF ".$trainer->CREF ?>
                                </p>
                                <p class="trainer-view mg-0 w400 p-inf"><?= $trainer->user->cities_id.','.$trainer->user->states_id ?></h5> 

                                <div class="price-section">
                                    <p class="w400 mg-0 p-inf">Aulas a partir de </p>
                                    <p class="w600 mg-0 p-inf"> <?= $trainer->average_price ?> / hora</p>
                                </div>
                            </div>

                        </div>

                    </div><!-- end .row -->
                    <div class="row">
                        <div class="col-md-12 text-center btn-contact text-uppercase">
                            <a href="#">Entrar em contato</a>
                        </div>
                    </div>
                </div>
            </div><!-- end .profile-inf  -->
            <div class="col-md-7 mg-left">
                <div class="row">
                    <div class="col-md-12 profile-card">
                        <div class="subtitle-cont">
                            <h4 class="w600 subtitle">Sobre o treinador</h4>
                        </div>
                        <hr>
                        <div class="contn">
                            <?= $trainer->bio ?>
                        </div>
                    </div>
                    <div class="col-md-12 profile-card">
                        <div class="subtitle-cont">
                        <?= $this->Html->image('especialidades.png'); ?>
                        <h4 class="w600 subtitle">Especialidades</h4>
                        </div>
                        <hr>
                        <div class="contn">
                                <?php foreach ($trainer->specialties as $specialty): ?>
                                    <div class="label label-specialties"><?= h($specialty->name) ?></div>
                                <?php endforeach; ?>
                            </div>
    
                    </div>
                    <div class="col-md-12 profile-card">
                        <div class="subtitle-cont">
                        <?= $this->Html->image('formacao.png'); ?>
                        <h4 class="w600 subtitle">Formação</h4>
                        </div>
                        <hr>
                        <div class="contn">
                            <ul id="degrees">
                                <?php foreach ($trainer->degrees as $degree): ?>
                                <li class="degree-info" id="<?= h($degree->id) ?>" >
                                    <div class="block degree-course">
                                    <span style="font-weight: 600;" class="value-degree-course"><?= h($degree->course) ?></span>
                                    </div>
                                    <div class="block degree-instituition">
                                        <?= h($degree->instituition) ?>
                                    </div>
                                    <div class="block degree-description">
                                        <?= h($degree->description) ?>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-12 profile-card last-card">
                        <div class="subtitle-cont">
                        <?= $this->Html->image('regiao-que-atende.png'); ?>
                        <h4 class="w600 subtitle">Regiões em que atende</h4>
                        </div>
                        <hr>
                        <div class="contn">
                            <ul id="locations">
                                <?php foreach ($trainer->locations as $location): ?>
                                <li class="location_name" id="<?= h($location->id) ?>" ><span style="font-weight: 600;" class="value-location"><?= h($location->location) ?></span><span class="sp-option-menu edit-location-name">editar</span><span class="sp-option-menu delete-location-name">excluir</span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>

