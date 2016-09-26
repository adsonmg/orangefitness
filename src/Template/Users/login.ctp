<!-- Bootstrap core CSS -->
<?= $this->Html->css('bootstrap.css', ['block' => true]) ?>

    <!-- Custom styles for this template -->
   
    <?= $this->Html->css('ionicons.min.css', ['block' => true]) ?>
    <?= $this->Html->css('tl-home-style.css', ['block' => true]) ?>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <?= $this->Html->script('ie10-viewport-bug-workaround.js', ['block' => true]) ?>
    
      <?php
    use Cake\Routing\Router;
    use Cake\View\Helper\UrlHelper;
    
     echo $this->Html->script('jquery-1.10.2.js', ['block' => true]);
    echo $this->Html->script('jquery-ui.js', ['block' => true]);
       echo $this->Html->css('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', ['block' => true]);
?>
    
    <style>
        .register-input {
            float: left;
            width: 100%;
            text-align: left;
        }
        .pl{
            text-align: right;
            margin: 9px 0px;
            width: 90%;
            padding-right: 5px;
            float: right;
        }
        .f-right{
            float: right;
        }
        #home-header {
            padding-top: 114px;
        }
    </style>
<div id="home-header">
    <!-- header -->
    <?= $this->element('header'); ?>
    <!-- end header -->
  <div class="container login pb">
    <div class="row">
      <div class="col-md-8">
        <h1>Encontre mais clientes e cresça como treinador</h1>
        <h4>Mais de <span style="font-weight: 600; color: #FE6055">10,5 milhões</span> de acesso por mês.</h4>
      </div><!--/col-md-6-->
       <div class="col-md-4">
        <form method="get" accept-charset="utf-8" action="/trainerlink/trainers/search"> 
            <div class="input text">
            <button class="btn btn-conf btn-input f-right" type="submit" style="width: 100%; margin: 0px; ">Login</button>            </div>
            <div class="pl" style="text-align: center">
                <b> OU CADASTRE-SE </b> 
            </div>
            <div class="input text"><input type="text"class="register-input" placeholder="Nome"></div>      
            <div class="input text"><input type="text"class="register-input" placeholder="Email"></div>     
            <div class="input text"><input type="text"class="register-input" placeholder="CPF"></div>     
            <div class="input text"><input type="text"class="register-input" placeholder="Senha"></div>     
            <div class="input text"><input type="text"class="register-input" placeholder="Confirmar Senha"></div> 
            <div class="pl" style="text-align: right">
                Ao criar uma conta, você concorda com nossos <a href="">termos de uso</a> e 
                <a href="">política de privacidade</a>
            </div>
           <button class="btn btn-conf btn-input f-right" type="submit">Cadastrar</button>            
        </form>
      </div><!--/col-md-6-->
    </div>
  </div>
</div><!-- /H -->

