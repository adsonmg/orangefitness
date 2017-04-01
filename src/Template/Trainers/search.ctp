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

<?= $this->element('search-bar', [
                    "city" => $city
    ]); ?>


<section id="content" class="sec-content">
    <div class="container">
        <div class="row heading">
            <!-- Heading -->
            <p>1 - 16 de 234 treinadores encontrados</p>
        </div>
        <div class="row">
            <!-- item -->
            <div class="col-md-3 sidebar sidebar-card">
                <h5 class="ms w600"><?= $this->Html->image('tl-filter.png') ?> <span style="margin-left: 5px">Filtre seus Resultados</span></h5>
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
                <h5 class="ms w600 ul-title">Tipo de sessão:</h5>
                <ul class="nav nav-sidebar ms">
                    <li> 
                        <div class="checkbox">
                            <label>
                                <input class="checkbox" type="checkbox" name="local" value="1" checked="true"> Presencial
                             </label>
                        </div>
                   </li>
                   <li> 
                        <div class="checkbox">
                            <label>
                                <input class="checkbox" type="checkbox" name="online" value="2" checked="true"> Online
                             </label>
                        </div>
                   </li>
                </ul>
            </div>
            <!-- end: -->

            <!-- result-search -->
            <div class="col-md-7 tileBox result-ser">
                <?php foreach ($trainers as $trainer): ?>
                    <?= $this->element('trainer-card',["trainer" => $trainer]); ?>
                    
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

