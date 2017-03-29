<!-- Bootstrap core CSS -->
<?= $this->Html->css('bootstrap.css', ['block' => true]) ?>

<!-- Custom styles for this template -->

<?= $this->Html->css('ionicons.min.css', ['block' => true]) ?>
<?= $this->Html->css('tl-profile-style.css', ['block' => true]) ?>
<?= $this->Html->css('footer.css', ['block' => true]) ?>

<!--
<script>
$(document).ready(function(){
    $('#card-affix').affix({
        offset: {
            top: $('#card-affix').offset().top,
            
        }
      });
      
});
</script>
-->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <?= $this->Html->script('ie10-viewport-bug-workaround.js', ['block' => true]) ?>


 <script type="text/javascript">
     $(document).ready(function () {
         $(document).on('submit', '#form-contact', function(e){
            //Get fomr data
            var data = $(this).serialize();          

            //Create a post request
            var request = $.post('<?php
                            echo $this->Url->build([
                                'controller' => 'Trainers',
                                'action' => 'sendEmail',
                                $trainer->id
                            ]);
                            ?>',
                            data);
            
            //Get request response
            request.done(function () {
                $('#modal-form').replaceWith("Mensagem enviada com sucesso!");

            })
            .fail(function (response) {
                $('#modal-form').replaceWith("Ocorreu um erro! Por favor, tente novamente.");
            });
            
            return false;
            
        });
       
     });
 </script>

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
                <div >
                    <div class="row profile-card profile-inf">
                        <div class="col-md-12 text-center">
                            <div class="foto centered">
                                <?= $this->element('profile-picture',[
                                    'img_porfile' => $trainer->user->picture
                                ]); ?>
                            </div>
                            <div class="col-md-12 text-center mg-top-15">
                                <h4 class="trainer-name mg-0"><?= $trainer->user->name ?></h4>
                                <p class="trainer-specialty mg-0 w400 p-inf">
                                Personal Trainer
                                </p>
                                <p class="trainer-view text-uppercase mg-0 w400 p-inf">
                                <?= "CREF ".$trainer->CREF ?>
                                </p>
                                <p class="trainer-view mg-0 w400 p-inf"><?= $trainer->user->city->name.','.$trainer->user->state->uf ?></h5> 

                                <div class="price-section">
                                    <p class="w400 mg-0 p-inf">Aulas a partir de </p>
                                    <p class="w600 mg-0 p-inf"> <?= $trainer->average_price ?> / hora</p>
                                </div>
                            </div>

                        </div>

                    </div><!-- end .row -->
                    <div class="row">
                        <div class="col-md-12 text-center btn-contact text-uppercase">
                            <a href="#" data-toggle="modal" data-target="#myModal">Entrar em contato</a>
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

        <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Entre em contato com o treinador</h4>
            </div>
            <div class="modal-body">
                <div id="modal-form">
                    <?=  $this->Form->create(null, [
                            'id' => 'form-contact',
                        ]); 
                        echo "<div class=\"input text\">" . $this->Form->input('name', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Nome completo',
                                    'label' => false
                                ]) . "</div>";

                        echo "<div class=\"input text\">" . $this->Form->input('age', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Sua idade',
                                    'label' => false
                                ]) . "</div>";

                        echo "<div class=\"input text\">" . $this->Form->input('email', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Email para contato',
                                    'label' => false
                                ]) . "</div>";

                        echo "<div class=\"input text\">" . $this->Form->textarea('message', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Escreva uma breve descrição dos resultados que pretende alcançar',
                                    'label' => false
                                ]) . "</div><br/>";

                        echo "<div class=\"input text\">" . $this->Form->select('deadline', 
                                [
                                    1 => 'Nos próximos dias',
                                    2 => 'Nas próximas semanas',
                                    3 => 'Estou apenas pesquisando'
                                ],
                                [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'empty' => 'Quando gostaria de iniciar?'
                                ]) . "</div>";
                            

                        echo $this->Form->button(__('Enviar'), [
                            'class' => 'btn btn-conf btn-input'
                        ]); 
                        echo $this->Form->end(); 
                    ?>
                </div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</section>

