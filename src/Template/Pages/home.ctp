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

<div class="container pb">
  <div class="row">
    <h2 class="centered title-600">Explore</h2>
    <h4 class="mb centered">Encontre profissionais qualificados</h4>
    <div class="col-md-6">
        <?= $this->element('trainer-card',[
            "trainer_name" => "Edson Nascimento",
            "trainer_location" => "Curitiba,PR",
            "trainer_image" => "trainer.PNG",
            "trainer_views" => "+1000",
            "trainer_specialty" => "Personal Trainer",
            "trainer_bio" => "Nemo enim ipsam voluptatem quia voluptas"
            . " sit aspernatur aut odit aut fugit, sed quia "
            . "consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt."
        ]); ?>
    </div><!--/col-md-4-->

     <div class="col-md-6">
         <?= $this->element('trainer-card',[
            "trainer_name" => "Christina Souza",
            "trainer_location" => "Varginha,MG",
            "trainer_image" => "trainer2.PNG",
            "trainer_views" => "+2000",
            "trainer_specialty" => "Yoga",
            "trainer_bio" => "Nemo enim ipsam voluptatem quia voluptas"
            . " sit aspernatur aut odit aut fugit, sed quia "
            . "consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.",
        ]); ?>
    </div><!--/col-md-4-->
    
    <div class="col-md-6">
        <?= $this->element('trainer-card',[
            "trainer_name" => "Edson Nascimento",
            "trainer_location" => "Curitiba,PR",
            "trainer_image" => "trainer.PNG",
            "trainer_views" => "+1000",
            "trainer_specialty" => "Personal Trainer",
            "trainer_bio" => "Nemo enim ipsam voluptatem quia voluptas"
            . " sit aspernatur aut odit aut fugit, sed quia "
            . "consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt."
        ]); ?>
    </div><!--/col-md-4-->

     <div class="col-md-6">
         <?= $this->element('trainer-card',[
            "trainer_name" => "Christina Souza",
            "trainer_location" => "Varginha,MG",
            "trainer_image" => "trainer2.PNG",
            "trainer_views" => "+2000",
            "trainer_specialty" => "Yoga",
            "trainer_bio" => "Nemo enim ipsam voluptatem quia voluptas"
            . " sit aspernatur aut odit aut fugit, sed quia "
            . "consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.",
        ]); ?>
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
