<!-- Bootstrap core CSS -->
<?= $this->Html->css('bootstrap.css', ['block' => true]) ?>

<!-- Custom styles for this template -->

<?= $this->Html->css('ionicons.min.css', ['block' => true]) ?>
<?= $this->Html->css('tl-search-style.css', ['block' => true]) ?>
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
</style>
    
<!-- header -->
<?= $this->element('header'); ?>
<!-- end header -->

<section id="home">
    <div class="banner-container">
        <div class="container banner-content">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 centered">
                        <h2 style="margin-bottom: 12px;">
                            Os melhores treinadores perto de <span style="font-weight: 400; color: #FE6055"><?= $city ?></span> 
                        </h2>
                </div>
            </div>
        </div><!--/.banner-content-->
    </div><!--/.banner-container-->
</section><!--/#home-->

<section id="search-bar">
    <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 centered">
              <form method="get" accept-charset="utf-8" action="/trainerlink/trainers/search" class="form-inline">            
                    <div class="col-md-5" >
                        <select name="specialties" class="search-input form-control" placeholder="O que você procura?" id="specialties">
                            <option value="0">O que você procura?</option>
                        </select>
                    </div>            
                    <div class="col-md-5">
                        <input type="text" name="city" id="Autocomplete" class="search-input ui-autocomplete-input form-control" placeholder="Digite uma cidade" autocomplete="off" value="<?=$city?>">
                    </div>            
                    <input type="hidden" name="genre" id="city" value="3">            
                    <input type="hidden" name="section_type" id="city" value="both">       
                    <div class="col-md-2">
                    <button class="btn btn-conf btn-input" type="submit">Buscar</button>         
                    </div>
                </form>
          </div><!--/.col-->
        </div><!--/.row-->
    </div>
</section><!--/#search-bar-->

<section id="content" class="sec-content">
    <div class="container">
        <div class="heading">
            <!-- Heading -->
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </div>
        <div class="row">
            <!-- item -->
            <div class="col-md-3 sidebar">
                <ul class="nav nav-sidebar" >
                   <li><a href="#">Overview</a></li>
                   <li><a href="#">Reports</a></li>
                   <li><a href="#">Analytics</a></li>
                   <li><a href="#">Export</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="">Nav item</a></li>
                    <li><a href="">Nav item again</a></li>
                    <li><a href="">One more nav</a></li>
                    <li><a href="">Another nav item</a></li>
                    <li><a href="">More navigation</a></li>
                </ul>
            </div>
            <!-- end: -->

            <!-- result-search -->
            <div class="col-md-7 tileBox result-ser">
                <?php foreach ($trainers as $trainer): ?>
                    <div class="jumbotron">

                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-lg-4 text-right">
                                <!-- Profile foto -->
                                <div class="foto">
                                    <img src="https://ukieweb.com/envato/ukiecard/style1/assets/img/photo.png" class="foto-profile img-circle" alt="Ukieweb">

                                </div>
                                <!-- end your foto -->
                            </div>
                            <div class="col-xs-12 col-sm-8 col-lg-8">
                                <!-- Your Name -->
                                <h3 class="title"><?= $trainer->user->name ?></h3>
                                <!-- Your Profession -->
                                <h5 class="sub-title">Web Designer &amp; Mobile Application Developer</h5>
                                <p>
                                    <?= $this->Html->link('Ver perfil', ['controller' => 'Users', 
                                                                                 'action' => 'view', 
                                                                                 $trainer->user->id
                                                                            ],
                                                                            ['class'=>'btn btn-conf-2 btn-input', 
                                                                            'role'=>'Button'
                                                                            ]); ?>
                                  
                                    
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="paginator text-center">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
            <!-- end: -->

            <!-- item -->
            <div class="col-md-2 text-center tileBox">
                <div class="ads jumbotron">
                    lala
                </div>
            </div>
            <!-- end: -->
        </div>
    </div>
</section>

