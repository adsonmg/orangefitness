<!DOCTYPE html>
<html lang="en">
<head>
<!-- <title><?//= h($this->fetch('title')) ?></title> -->
    <title>Trainer Link - Encontre o seu treinador</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="./img/favicon.ico">

<!-- Include external files and scripts here (See HTML helper for more info.) -->
<?php
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>

<!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap.css') ?>

    <!-- Custom styles for this template -->
   
    <?= $this->Html->css('ionicons.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <?= $this->Html->script('ie10-viewport-bug-workaround.js') ?>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

<!-- If you'd like some sort of menu to
show up on all of your views, include it here --
<div id="header">
    <div id="menu">...</div>
</div>
-->

<!-- content -->
<?= $this->fetch('content') ?>
<!-- end content -->

<!-- footer -->
<?= $this->element('footer'); ?>
<!-- end footer -->

</body>
</html>