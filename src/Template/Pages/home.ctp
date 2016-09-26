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
    
    <script type="text/javascript">
      $(document).ready(function($){
            $('#Autocomplete').autocomplete({
            source:'<?php echo Router::url(array("controller" => "cities", "action" => "autoCompleteCities")); ?>',
            minLength: 3
        });  });
    </script>
    
   
    
<div id="home-header">
    <!-- header -->
    <?= $this->element('header'); ?>
    <!-- end header -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 centered">
        <h1 style="margin-bottom: 12px;">Encontre os melhores treinadores</h1>
        <h3 style="margin-top:0px">Mais de <span style="font-weight: 400; color: #FE6055">1204</span> treinadores cadastrados</h3>
        <div class="mtb">
            <?= $this->Form->create(null, [
                            'type' => 'get',
                            'url' => [
                                'controller' => 'Trainers',
                                'action' => 'search'
                                ]
                    ]) ?>
            
            <?= $this->Form->input('specialties', array('options' => $specialties, 
                                                'class'=>'search-input',
                                                'label' => false,
                                                'placeholder' => 'O que você procura?'
                        )
                    ) ?>
            <?= $this->Form->input('city',array('id' => 'Autocomplete', 
                                                'class'=>'search-input',
                                                'placeholder'=>'Digite uma cidade',
                                                'label' => false
                        )
                    ) ?>
            
            <?= $this->Form->input('city',array('type' => 'hidden',
                                                'name' => 'genre',
                                                'value' => 3
                        
                        )
                    ) ?>
            
            <?= $this->Form->input('city',array('type' => 'hidden',
                                                'name' => 'section_type',
                                                'value' => 'both'
                        
                        )
                    ) ?>
            <?= $this->Form->button('Buscar', array('class'=>'btn btn-conf btn-input')) ?>
            <?= $this->Form->end() ?>
            <!--
          <form role="form" action="register.php" method="post" enctype="plain"> 
            <input type="text" name="email" class="search-input" placeholder="Personal Trainer" required>
            <input type="text" name="email" class="search-input" id="Autocomplete"  placeholder="Digite uma cidade" required>
            <button class='btn btn-conf btn-input' type="submit">Buscar</button>
          </form>
            -->
        </div><!--/mt-->
        <h6><a href="#testimonial" class="help">Como funciona?</a></h6>
      </div>
    </div><!--/row-->
  </div><!--/container-->
</div><!-- /H -->
<section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                    <div class="img-cont">  
                                        <?= $this->Html->image('tl1.png'); ?>
                                    </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                    <div class="img-cont">  
                                        <?= $this->Html->image('tl2.png'); ?>
                                    </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                    <div class="img-cont">  
                                        <?= $this->Html->image('tl3.png'); ?>
                                    </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                    <div class="img-cont">  
                                        <?= $this->Html->image('tl4.png'); ?>
                                    </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

<div class="container ptb">
  <div class="row">
    <h2 class="centered">Explore</h2>
    <h4 class="mb centered">Encontre profissionais qualificados</h4>
    <div class="col-md-6">
        <div class="jumbotron">

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-lg-4 text-right">
                    <!-- Profile foto -->
                    <div class="foto centered">
                        <img src="http://cdn.shopify.com/s/files/1/0535/6917/products/personaltrainershirt.jpeg?v=1414445691" class="foto-profile img-circle" alt="Ukieweb">

                    </div>
                    <!-- end your foto -->
                </div>
                <div class="col-xs-12 col-sm-8 col-lg-8">
                    <!-- Your Name -->
                    <h3 class="title">Edson Nascimento</h3>
                    <!-- Your Profession -->
                    <h5 class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                        ut aliquip ex ea commodo consequat.
                    </h5>
                    <p>
                        <a href="#" class="btn btn-conf-2 btn-input" role="Button">Ver perfil</a>                                  

                    </p>
                </div>
            </div>
        </div>
    </div><!--/col-md-4-->

     <div class="col-md-6">
         <div class="jumbotron">

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-lg-4 text-right">
                    <!-- Profile foto -->
                    <div class="foto centered">
                        <img src="http://cdn.shopify.com/s/files/1/0535/6917/products/personaltrainershirt.jpeg?v=1414445691" class="foto-profile img-circle" alt="Ukieweb">

                    </div>
                    <!-- end your foto -->
                </div>
                <div class="col-xs-12 col-sm-8 col-lg-8">
                    <!-- Your Name -->
                    <h3 class="title">Edson Nascimento</h3>
                    <!-- Your Profession -->
                    <h5 class="sub-title">Duis aute irure dolor in reprehenderit in voluptate velit 
                        esse cillum dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                        deserunt mollit anim id est laborum.
                    </h5>
                    <p>
                        <a href="#" class="btn btn-conf-2 btn-input" role="Button">Ver perfil</a>                                  


                    </p>
                </div>
            </div>
        </div>
    </div><!--/col-md-4-->

  </div><!--/row-->
</div><!--/container-->

<div id="testimonial">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 centered">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <h3>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </h3>
              <h5><tgr>The Rock</tgr></h5>
            </div>
            <div class="item">
              <h3>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</h3>
              <h5><tgr>Vin Diesel</tgr></h5>
            </div>
            <div class="item">
              <h3>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</h3>
              <h5><tgr>Arnold</tgr></h5>
            </div>
          </div>
        </div><!--/Carousel-->

      </div>
    </div><!--/row-->
  </div><!--/container-->
</div><!--/green-->

<div id="sep">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-2">
        <h1>Treinador?</h1>
        <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</h4>
        <p><button class="btn btn-conf-2 btn-input">Começar</button></p>
      </div><!--/col-md-8-->
    </div>
  </div>
</div><!--/sep-->
