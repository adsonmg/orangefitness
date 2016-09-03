<!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap.css', ['block' => true]) ?>

    <!-- Custom styles for this template -->
   
    <?= $this->Html->css('ionicons.min.css', ['block' => true]) ?>
    <?= $this->Html->css('style.css', ['block' => true]) ?>
    
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
    <div class="logo">Trainer<span style="font-family: 'Lato', sans-serif;font-weight: 200;">link</span></div>
  <div class="link hidden-xs">
    <a href="#">Ajuda</a>
    <a href="#">Blog</a>
    <?= $this->Html->link(__('Área do treinador'), ['controller' => 'Users', 'action' => 'login']) ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 centered">
        <h1 style="margin-bottom: 12px;">Encontre os melhores treinadores</h1>
        <h3 style="margin-top:0px">Mais de <span style="font-weight: 400; color: #FE6055">1204</span> treinadores cadastrados</h3>
        <div class="mtb">
          <form role="form" action="register.php" method="post" enctype="plain"> 
            <input type="text" name="email" class="search-input" placeholder="Personal Trainer" required>
            <input type="text" name="email" class="search-input" id="Autocomplete"  placeholder="Digite uma cidade" required>
            <button class='btn btn-conf btn-input' type="submit">Buscar</button>
          </form>
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
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-bicycle fa-stack-1x text-primary"></i>
                            </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-heart fa-stack-1x text-primary"></i>
                            </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-male fa-stack-1x text-primary"></i>
                            </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-shield fa-stack-1x text-primary"></i>
                            </span>
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
<!--
<div class="container ptb">
  <div class="row">
    <div class="col-md-6">
      <h2>All the features you want in this kind of apps you'll got it here.</h2>
      <p class="mt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      <p class="store">
        <a href="#"><img src="assets/img/app-store.png" height="50" alt=""></a>
        <a href="#"><img src="assets/img/google-play.png" height="50" alt=""></a>
      </p>
    </div>
    <div class="col-md-6">
      <img src="assets/img/phone.png" class="img-responsive mt" alt="">
    </div>
  </div><!--/row-
</div><!--/container-
-->

<div class="container ptb">
  <div class="row centered">
    <h2 class="mb">Our Pricing Model<br/>It's Quite Easy To Understand.</h2>
    <div class="col-md-4">
      <div class="price-table">
          <div class="p-head">
            Standard
          </div>
          <div class="p-body">
            <ul class="features">
              <li>10GB Storage Space</li>
              <li>Free Support</li>
              <li>100 Users</li>
              <li>100GB Bandwith</li>
            </ul>
            <div class="price">
              <span class="sub">$</span>
              <span class="detail">29</span>
              <span class="sub">/mo.</span>
            </div><!--/price-->
            <button class="btn btn-conf-2 btn-input">Ver Perfil</button>
          </div><!--/p-body-->
      </div><!--/price-table-->
    </div><!--/col-md-4-->

     <div class="col-md-4">
      <div class="price-table">
          <div class="p-head">
            Business
          </div>
          <div class="p-body">
            <ul class="features">
              <li>50GB Storage Space</li>
              <li>Free Support</li>
              <li>500 Users</li>
              <li>500GB Bandwith</li>
            </ul>
            <div class="price">
              <span class="sub">$</span>
              <span class="detail">49</span>
              <span class="sub">/mo.</span>
            </div><!--/price-->
            <button class="btn btn-conf-2 btn-input">Ver Perfil</button>
          </div><!--/p-body-->
      </div><!--/price-table-->
    </div><!--/col-md-4-->

     <div class="col-md-4">
      <div class="price-table">
          <div class="p-head">
            Corporate
          </div>
          <div class="p-body">
            <ul class="features">
              <li>100GB Storage Space</li>
              <li>Free Support</li>
              <li>10,000 Users</li>
              <li>3TB Bandwith</li>
            </ul>
            <div class="price">
              <span class="sub">$</span>
              <span class="detail">89</span>
              <span class="sub">/mo.</span>
            </div><!--/price-->
            <button class="btn btn-conf-2 btn-input">Ver Perfil</button>
          </div><!--/p-body-->
      </div><!--/price-table-->
    </div><!--/col-md-4-->
  </div><!--/row-->
</div><!--/container-->
<!--
<div id="g">
  <div class="container">
    <div class="row sponsor centered">
      <div class="col-sm-2 col-sm-offset-1">
        <img src="assets/img/client1.png" alt="">
      </div>
      <div class="col-sm-2">
        <img src="assets/img/client3.png" alt="">
      </div>
      <div class="col-sm-2">
        <img src="assets/img/client2.png" alt="">
      </div>
      <div class="col-sm-2">
        <img src="assets/img/client4.png" alt="">
      </div>
      <div class="col-sm-2">
        <img src="assets/img/client5.png" alt="">
      </div>
    </div><!--/row-
  </div>
</div><!--/g-
-->
<div id="testimonial">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 centered">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <h3>I enjoyed so much the last edition of Landing Sumo, that I bought the tickets for the new one edition of the event the first day.</h3>
              <h5><tgr>DAVID JHONSON</tgr></h5>
            </div>
            <div class="item">
              <h3>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h3>
              <h5><tgr>MARK LAWRENCE</tgr></h5>
            </div>
            <div class="item">
              <h3>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration, by injected humour.</h3>
              <h5><tgr>LISA SMITH</tgr></h5>
            </div>
          </div>
        </div><!--/Carousel-->

      </div>
    </div><!--/row-->
  </div><!--/container-->
</div><!--/green-->

<div id="sep">
  <div class="container">
    <div class="row centered">
      <div class="col-md-8 col-md-offset-2">
        <h1>Join your experiences with the people you care more. Let us help you.</h1>
        <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</h4>
        <p><button class="btn btn-conf-2 btn-input">Learn More</button></p>
      </div><!--/col-md-8-->
    </div>
  </div>
</div><!--/sep-->
