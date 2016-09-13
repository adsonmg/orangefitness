<!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap.css', ['block' => true]) ?>

    <!-- Custom styles for this template -->
   
    <?= $this->Html->css('ionicons.min.css', ['block' => true]) ?>
    <?= $this->Html->css('style.css', ['block' => true]) ?>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <?= $this->Html->script('ie10-viewport-bug-workaround.js', ['block' => true]) ?>
    
<style>
    #home-header{
        min-height: 375px;
    }    
    .header{
        position: absolute;
        width: 100%;
        top: 0;
        background-color: #FE6055;
        height: 82px;
    }
    body{
        background-color: #eee;
    }
    
    #search-bar{
        padding: 17px 0;
        border-width: 1px;
        border-style: solid;
        border-color: #C6C6C6;
        background-color: #fff;
    }
    .btn-input{
        float: left;
    }
    
    .search-input{
        width: 28%;
    }
    
    .jumbotron{
        background: #fff;
        text-align: left;
    }
    
    .result-search{
        margin-top: 70px;
    }
    
    .foto-profile{
        width: 150px;
        height: 150px;
    }
</style>
<div id="home-header">
    <div class="header">
    <div class="logo">Trainer<span style="font-family: 'Lato', sans-serif;font-weight: 200;">link</span></div>
  <div class="link hidden-xs">
    <a href="#">Ajuda</a>
    <a href="#">Blog</a>
    <?= $this->Html->link(__('Área do treinador'), ['controller' => 'Users', 'action' => 'login']) ?>
  </div>
    </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 centered">
        <h1 style="margin-bottom: 12px;">Encontre os melhores treinadores perto de <span style="font-weight: 400; color: #FE6055"><?= $city ?></span> </h1>
       
      </div>
    </div><!--/row-->
  </div><!--/container-->
</div><!-- /H -->
<!-- search-bar -->
<div id="search-bar" class="center"> 
    <div class="container">
          <form role="form" action="register.php" method="post" enctype="plain"> 
            <input type="text" name="email" class="search-input" placeholder="Personal Trainer" required>            
            <input type="text" name="email" class="search-input" id="Autocomplete"  placeholder="Digite uma cidade" required>
            <button class='btn btn-conf btn-input' type="submit">Buscar</button>
          </form>
    </div>
</div>
<!-- /search-bar -->
<div class="result-search container centered"> 
    
    <div class="row">
        <div class="navbar navbar-default  col-sm-3">
        lalalalal
    </div>
        
        <div class="col-sm-7">
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
                            <h3 class="title"><?= $this->Html->link($trainer->user->name, ['controller' => 'Users', 'action' => 'view', $trainer->user->id]) ?></h3>
                            <!-- Your Profession -->
                            <h5 class="sub-title">Web Designer &amp; Mobile Application Developer</h5>
                            <p>
                                <a class="btn btn-conf-2 btn-input" href="../../components/#navbar" role="button">Ver perfil</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
      
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>
        <div class="jumbotron col-sm-2">
        lalalalal
    </div>
    </div>
</div>