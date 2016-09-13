<div id="f">
  <div class="container">
    <div class="row centered">
      <?= $this->Html->image('logo.png', ['alt' => 'Trainer Link']); ?>
      <h5>Leve uma vida <?= $this->Html->image('tl-heart.png'); ?> muito mais saudável</h5>
      
      <div class="container left-align mt ft-content">
        <div class="row">
            <div class="col-sm-4">
              <h4>Matenha-se atualizado</h4>
              <p>Entre com seu email para receber mais informações</p>
              
            </div>
            <div class="col-sm-4">
              <h4>Empresa</h4>
              <ul class="list-group">
                    <li class="list"><a href="">Sobre</a></li>
                    <li class="list"><a href="">Blog Trainer Link</a></li> 
                    <li class="list"><a href="">Política de uso</a></li> 
                    <li class="list"><a href="">Treinador?</a></li>
              </ul>
            </div>
            <div class="col-sm-4">
              <h4>Descubra</h4> 
              <ul class="list-group">
                    <li class="list"><a href="">Como funciona?</a></li>
                    <li class="list"><a href="">Perguntas frequentes</a></li> 
                    <li class="list"><a href="">Por que ser um treinador?</a></li> 
                    <li class="list"><a href="">Fale conosco</a></li>
              </ul>
            </div>
        </div>
      </div>
      <p class="mt">
        <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      </p>
      <h6 class="mt"><?= date("Y"); ?> Trainer Link. Todos os direitos reservados.</h6>
    </div><!--/row-->
  </div><!--/container-->
</div><!--/F-->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('retina-1.1.0.js') ?>