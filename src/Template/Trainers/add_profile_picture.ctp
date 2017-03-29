<!-- Bootstrap core CSS -->
<?= $this->Html->css('bootstrap.css', ['block' => true]) ?>

<!-- Custom styles for this template -->

<?= $this->Html->css('ionicons.min.css', ['block' => true]) ?>
<?= $this->Html->css('tl-profile-style.css', ['block' => true]) ?>
<?= $this->Html->css('footer.css', ['block' => true]) ?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <?= $this->Html->script('ie10-viewport-bug-workaround.js', ['block' => true]) ?>

<!-- header -->
<?= $this->element('header'); ?>
<!-- end header -->

<section id="content" class="sec-content mg-top-75">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 profile-card p32">
                <?= $this->Form->create($trainer, ['type' => 'file']) ?>
                <fieldset>

                    <div class="input text">
                        <input type="file" name="picture[]" class="form-control">
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Salvar'), [
                    'class' => 'btn btn-conf btn-input'
                ]) ?>
                <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</section>
