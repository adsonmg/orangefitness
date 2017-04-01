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
<script>
    $(document).ready(function () {      
        $('#states-id').change(function() {
          $('#cities').load('<select name="cities_id" id="cities-id"><option value="-1">Carregando..</option></select>');
          $('#cities').load('../getCitiesBp/'+$(this).val());
        });
       
    });
</script>

<section id="content" class="sec-content mg-top-75">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 profile-card p32">
                <?= $this->Form->create($trainer, ['type' => 'file']) ?>
                <fieldset>
                    <div class="foto centered pb15">
                        <?= $this->element('profile-picture',[
                            'img_porfile' => $trainer->user->picture
                        ]); ?>
                    </div>
                    <div class="input text">
                        <input type="file" name="picture[]" class="form-control">
                    </div>
                    <?php

                        // echo "<div class=\"input text\">" . $this->Form->file('picture',[
                        //      'class' => 'form-control',

                        // ]) . "</div>";
                         echo "<div class=\"input text\">" . $this->Form->input('user.name', [
                            'class' => 'form-control',
                            'placeholder' => 'Nome',
                            'value' => $trainer->user->name,
                            'label' => false
                        ]) . "</div>";
                        
                        echo "<div class=\"input text\">" . $this->Form->select('type_of_section', 
                            [
                                1 => 'Presencial',
                                2 => 'Online',
                                3 => 'Presencial e Online'
                            ],
                            [
                                'label' => false,
                                'class' => 'form-control',
                            ]) . "</div>";
                        
                        echo "<div class=\"input text\">" . $this->Form->input('CREF', [
                            'class' => 'form-control',
                            'placeholder' => 'CREF',
                            'label' => false,
                            'value' => $trainer->CREF
                        ]) . "</div>";
                        
                        echo "<div class=\"input text\">" . $this->Form->input('years_training', [
                            'type' => 'text',
                            'class' => 'form-control',
                            'placeholder' => 'Há quantos anos atua como profissional',
                            'label' => false,
                            'value' => $trainer->years_training

                        ]) . "</div>";
             
                        echo "<div class=\"input text\">" . $this->Form->input('user.email', [
                            'class' => 'form-control',
                            'value' => $trainer->user->email,
                            'placeholder' => 'Email',
                            'label' => false
                        ]) . "</div>";

                        
                        echo "<div class=\"input text\">" . $this->Form->input('user.CPF', [
                            'class' => 'form-control',
                            'placeholder' => 'CPF',
                            'value' => $trainer->user->CPF,
                            'label' => false
                        ]) . "</div>";

                        echo "<div class=\"input text\">" . $this->Form->input('user.states_id', [
                            'class' => 'form-control',
                            'placeholder' => 'Estado',
                            'value' => $trainer->user->states_id,
                            'options' => $states,
                            'label' => false,
                            'id' => 'states-id'
                        ]) . "</div>";

                        echo '<span id="cities">';
                        echo "<div class=\"input text\">" . $this->Form->input('user.cities_id', [
                            'class' => 'form-control',
                            'placeholder' => 'Cidade',
                            'value' => $trainer->user->cities_id,
                            'options' => $cities,
                            'label' => false
                        ]) . "</div>";
                        echo '</span>';

                        echo "<div class=\"input text\">" . $this->Form->select('user.genre', [1 => 'Masculino', 2 => 'Feminino'], [
                            'empty' => 'Escolha um genero', 
                            'label' => false,
                            'class' => 'form-control',
                            'value' => $trainer->user->genre
                            ]) . "</div>";
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Salvar'), [
                    'class' => 'btn btn-conf btn-input'
                ]) ?>
                <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</section>
