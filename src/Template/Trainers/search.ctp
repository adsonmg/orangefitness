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

.trainer-card{
    border-color: #d9d9d9 !important;
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
        <div class="row heading">
            <!-- Heading -->
            <p>1 - 16 de 234 treinadores encontrados</p>
        </div>
        <div class="row">
            <!-- item -->
            <div class="col-md-3 sidebar sidebar-card">
                <h5 class="ms w600">Filtre seus Resultados</h5>
                <hr>
                <h5 class="ms w600 ul-title">Preferência por treinador(a):</h5>
                <ul class="nav nav-sidebar ms" >
                   <li> 
                        <div class="checkbox">
                            <label>
                                <input class="checkbox" type="checkbox" name="woman" value="woman" checked="true"> Mulher
                             </label>
                        </div>
                   </li>
                   <li> 
                        <div class="checkbox">
                            <label>
                                <input class="checkbox" type="checkbox" name="man" value="man" checked="true"> Homem
                             </label>
                        </div>
                   </li>
                </ul>
                <hr>
                <h5 class="ms w600 ul-title">Realizar treinamentos em:</h5>
                <ul class="nav nav-sidebar ms">
                    <li> 
                        <div class="checkbox">
                            <label>
                                <input class="checkbox" type="checkbox" name="gym" value="gym" checked="true"> Academia
                             </label>
                        </div>
                   </li>
                   <li> 
                        <div class="checkbox">
                            <label>
                                <input class="checkbox" type="checkbox" name="house" value="house" checked="true"> Casa
                             </label>
                        </div>
                   </li>
                   <li> 
                        <div class="checkbox">
                            <label>
                                <input class="checkbox" type="checkbox" name="park" value="park" checked="true"> Parques
                             </label>
                        </div>
                   </li>
                </ul>
            </div>
            <!-- end: -->

            <!-- result-search -->
            <div class="col-md-7 tileBox result-ser">
                <?php foreach ($trainers as $trainer): ?>
                    <?= $this->element('trainer-card',[
                            "trainer_name" => $trainer->user->name,
                            "trainer_location" => "Varginha,MG",
                            "trainer_image" => "trainer.PNG",
                            "trainer_views" => "+2000",
                            "trainer_specialty" => "Yoga",
                            "trainer_bio" => "Nemo enim ipsam voluptatem quia voluptas"
                            . " sit aspernatur aut odit aut fugit, sed quia "
                            . "consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.",
                        ]); ?>
                    
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
                    Ad
                </div>
            </div>
            <!-- end: -->
        </div>
    </div>
</section>

