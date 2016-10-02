<!-- Bootstrap core CSS -->
<?= $this->Html->css('bootstrap.css', ['block' => true]) ?>

<!-- Custom styles for this template -->

<?= $this->Html->css('ionicons.min.css', ['block' => true]) ?>
<?= $this->Html->css('tl-profile-style.css', ['block' => true]) ?>
<?= $this->Html->css('footer.css', ['block' => true]) ?>

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

<section id="content" class="sec-content">
    <div class="container">
        <div class="row">
            <!-- item -->
            <div class="col-md-7 mg-rt">
                <div class="row">
                    <div class="col-md-12 profile-card">
                        <h4 class="w400">Sobre o treinador</h4>
                        <hr>
                        Lorem ipsum dolor sit amet, illum decore omittam nec et, eu per semper singulis,
                        inani facete ius ne. Te iriure definiebas reprehendunt per, cum ne quas indoctum,
                        qui et nobis facilis alienum. Nam alii paulo at, vis iriure legimus et, delectus 
                        delicatissimi at vim. Debet munere utroque sit et, solum partem phaedrum eam an, 
                        est brute impetus comprehensam ut.
                        Te vix oratio dissentias, an aliquip antiopam per, an diam clita affert nam. 
                        Fierent scriptorem te duo, ea posse recusabo deseruisse vix. Delenit maluisset ius eu, 
                        ei oratio facilis interpretaris eam. Ex laudem qualisque nec, nihil adipisci referrentur 
                        id sed, mollis tincidunt concludaturque at sed. An error simul vis.
                    </div>
                    <div class="col-md-12 profile-card">
                        <h4 class="w400">Especialidades</h4>
                        <hr>
                        <ul>
                            <li>Hipertrofia</li>
                            <li>Dieta Low Carb</li>
                            <li>Fisioterapia Muscular</li>
                        </ul>
    
                    </div>
                    <div class="col-md-12 profile-card">
                        <h4 class="w400">Formação</h4>
                        <hr>
                        <ul>
                            <li><span style="font-weight: 600;">  Lorem ipsum dolor sit amet, illum decore omittam </span><br>
                        inani facete ius ne. Te iriure definiebas reprehendunt per, cum ne quas indoctum.
                            </li>
                            <li><span style="font-weight: 600;">  Nam alii paulo at, vis iriure legimus </span><br>
                        delicatissimi at vim. Debet munere utroque sit et, solum partem phaedrum eam an.</li>
                            <li><span style="font-weight: 600;">  Debet munere utroque sit et </span><br>
                        est brute impetus comprehensam ut.</li>
                        </ul>

                    </div>
                    <div class="col-md-12 profile-card">
                        <h4 class="w400">Cursos</h4>
                        <hr>
                        <ul>
                            <li><span style="font-weight: 600;"> Lorem ipsum dolor sit amet</span> <br>
                        inani facete ius ne. Te iriure definiebas reprehendunt per, cum ne quas indoctum.
                            </li>
                            <li><span style="font-weight: 600;"> Nam alii paulo at, vis iriure </span> <br>
                        delicatissimi at vim. Debet munere utroque sit et, solum partem phaedrum eam an.</li>
                            <li><span style="font-weight: 600;">Debet munere utroque </span> <br> 
                        est brute impetus comprehensam ut.</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 profile-card profile-inf">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="foto centered">
                            <?= $this->Html->image('trainer.png', ['class'=>'foto-profile img-circle']); ?>
                        </div>
                        <p class="trainer-views">
                            <span style="font-weight: 600">                 
                                +1000
                             </span> 
                            </br>
                            visualizações
                        </p>
                        <p class="trainer-specialty">
                            Personal Trainer
                        </p>
                    </div>
                    <div class="col-md-12 text-center">
                        <h4 class="trainer-name">Edson Nascimento</h4>
                        <h5>Curitiba,PR</h5>
                        <a href="#" class="btn btn-conf-2 btn-input btn-trainer" role="Button">Entrar em contato</a> 
                    </div>
                    
                </div>
            </div>
            <!-- end: -->
        </div>
    </div>
</section>

