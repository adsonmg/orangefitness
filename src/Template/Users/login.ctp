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
            <div class="input text">
                <?= $this->Form->create() ?>
                <?php
                    echo "<div class=\"input text\">" . $this->Form->input('email',[
                        'class' => 'register-input', 
                         'placeholder' => 'Email',
                         'label' => false
                    ]). "</div>";
                    echo "<div class=\"input text\">" . $this->Form->input('password',[
                        'class' => 'register-input', 
                         'placeholder' => 'Senha',
                         'label' => false
                    ]). "</div>";
                ?>
                <?= $this->Form->button(__('Login'),[
                 'class' => 'btn btn-conf btn-input',
                 'style' => 'width: 100%; margin: 0px;'
                ]) ?>
             <?= $this->Form->end() ?>
            <div class="pl" style="text-align: center">
                <b> OU CADASTRE-SE </b> 
            </div>
            <?= $this->Form->create(null, [
                'url' => ['controller' => 'Users', 'action' => 'register']
            ]) ?>
            <?php
                echo "<div class=\"input text\">" . $this->Form->input('name',[
                    'class' => 'register-input',
                    'placeholder' => 'Nome',
                     'label' => false
                ]). "</div>";
                echo "<div class=\"input text\">" . $this->Form->input('email',[
                    'class' => 'register-input', 
                     'placeholder' => 'Email',
                     'label' => false
                ]). "</div>";
                echo "<div class=\"input text\">" . $this->Form->input('password',[
                    'class' => 'register-input', 
                     'placeholder' => 'Senha',
                     'label' => false
                ]). "</div>";
                echo "<div class=\"input text\">" . $this->Form->input('CPF',[
                    'class' => 'register-input', 
                     'placeholder' => 'CPF',
                     'label' => false
                ]). "</div>";
                echo "<div class=\"input text\">" . $this->Form->input('states_id',[
                    'class' => 'register-input', 
                     'placeholder' => 'Estado',
                     'options' => $states,
                     'label' => false
                ]). "</div>";
                echo "<div class=\"input text\">" . $this->Form->input('cities_id',[
                    'class' => 'register-input', 
                     'placeholder' => 'Cidade',
                     'options' => $cities,
                     'label' => false
                ]). "</div>";
                
                echo "<div class=\"input text\">" . $this->Form->input('genre',[
                    'class' => 'register-input', 
                     'placeholder' => 'genero',
                     'label' => false
                ]). "</div>";
            ?>
            <div class="pl" style="text-align: right">
                Ao criar uma conta, você concorda com nossos <a href="">termos de uso</a> e 
                <a href="">política de privacidade</a>
            </div>
             <?= $this->Form->button(__('Cadastrar'),[
                 'class' => 'btn btn-conf btn-input f-right'
             ]) ?>
             <?= $this->Form->end() ?>
      </div><!--/col-md-6-->
    </div>
  </div>
</div><!-- /H -->

