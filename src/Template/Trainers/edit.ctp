<!-- Bootstrap core CSS -->
<?= $this->Html->css('bootstrap.css', ['block' => true]) ?>

<!-- Custom styles for this template -->

<?= $this->Html->css('ionicons.min.css', ['block' => true]) ?>
<?= $this->Html->css('tl-profile-style.css', ['block' => true]) ?>
<?= $this->Html->css('footer.css', ['block' => true]) ?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <?= $this->Html->script('ie10-viewport-bug-workaround.js', ['block' => true]) ?>

<script>
    $(document).ready(function () {
        //=======================Location=================================
        //Location Form submit
        $("#form-location").submit(function (event) {

            //Get fomr data
            var data = $(this).serialize();

            //Create a post request
            var request = $.post('<?php
            echo $this->Url->build([
                'controller' => 'Locations',
                'action' => 'add'
            ]);
            ?>',
            data);

            //Get request response
            request.done(function (response) {
                var obj = jQuery.parseJSON(response);
                $("#input-add-location").val('');
                $("#locations").append('<li class="edit location_name"  id="' + obj.id + '" ><span style="font-weight: 600;" class="value-location">' + obj.location + "</span><span class=\"sp-option-menu edit-location-name\">editar</span><span class=\"sp-option-menu delete-location-name\">excluir</span></li>");

            })
            .fail(function () {
                alert("error");
            });
            return false;

        });
        
        
        //Location Edit
        //source: http://jsfiddle.net/Lf2v2rbd/1/
        $(document).on('click', '.edit-location-name', function(e){
            var curName = $(this).parent().find('.value-location').text();
            var curId = $(this).parent().attr('id');
            $(this).parent().replaceWith('<input class="form-control" type="text" curId="'+ curId +'" id="location-name-input" value="'+ curName +'" />');
        });
        
        $(document).on('click', '.delete-location-name', function(e){
            var thisParent =  $(this).parent();
            var elementId = $(this).parent().attr('id');
            var requestDelete = $.post('<?= $this->Url->build(['controller' => 'Locations', 'action' => 'delete']);
                ?>',
                {
                    'id': elementId
                });
            requestDelete.done(function (response){
                thisParent.remove();
            })
            .fail(function(jqXHR, textStatus, errorThrown){
                console.log('error: ' + errorThrown);
                alert('Ocorreu um erro ao deletar. Tente novamente.');
            });
        });
        
        $(document).on('blur keyup', '#location-name-input', function(e){
            var thisElement = this;
            if(e.keyCode === 13 || e.type === 'focusout'){
                var newName = $(this).val();
                var elemId = $(this).attr('curId');
                //Create a post request
                var requestEdit = $.post('<?= $this->Url->build(['controller' => 'Locations', 'action' => 'edit']);
                ?>',
                { 
                    'id': elemId, 
                    'location': newName // <-- the $ sign in the parameter name seems unusual, I would avoid it
                });

                //Get request response
                requestEdit.done(function (response) {
                    //alert(response);
                    $(thisElement).replaceWith('<li class="edit location_name" id="'+elemId+'"><span style="font-weight: 600;" class="value-location">' + newName + "</span><span class=\"sp-option-menu edit-location-name\">editar</span><span class=\"sp-option-menu delete-location-name\">excluir</span></li>");
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("error");
                });
            }
            //Use ajax to save changes
            return false;
        });
        
        //===========================End location==============
        
        //=============================Degree==================
        //Location Form submit
        $("#form-degree").submit(function (event) {

            //Get fomr data
            var data = $(this).serialize();

            //Create a post request
            var request = $.post('<?php
            echo $this->Url->build([
                'controller' => 'Degrees',
                'action' => 'add'
            ]);
            ?>',
            data);

            //Get request response
            request.done(function (response) {
                var obj = jQuery.parseJSON(response);
                $("#input-add-degree-instituition").val('');
                $("#input-add-degree-course").val('');
                $("#input-add-degree-duration").val('');
                $("#input-add-degree-description").val('');
                $("#degrees").append("<li class=\"edit degree-info\" id=\"" + obj.id +"\" >" +
                                "<div class=\"block degree-course\">" +
                                "<span style=\"font-weight: 600;\" class=\"value-degree-course\">"+obj.course+"</span>" +
                                "<span class=\"sp-option-menu edit-degree\">editar</span>" +
                                "<span class=\"sp-option-menu delete-degree\">excluir</span>" +
                                "</div>" +
                                "<div class=\"block degree-instituition\">"+
                                 obj.instituition +
                                "</div>" +
                                "<div class=\"block degree-description\">" +
                                 obj.description +
                                "</div>" +
                            "</li>");
            })
            .fail(function () {
                alert("error");
            });
            return false;

        });
        
        //Delete Degree
        $(document).on('click', '.delete-degree', function(e){
            var thisParent =  $(this).parent().parent();
            var elementId = thisParent.attr('id');
            
            var requestDelete = $.post('<?php
                echo $this->Url->build([
                    'controller' => 'Degrees',
                    'action' => 'delete'
                ]);
                ?>',
                {
                    'id': elementId
                });
            requestDelete.done(function (response){
                thisParent.remove();
            })
            .fail(function(jqXHR, textStatus, errorThrown){
                console.log('error: ' + errorThrown);
                alert('Ocorreu um erro ao deletar. Tente novamente.');
            });
        });
        
        //TODO: ainda existem itens para serem corrigidos nessa parte
        //Edit Degree
        $(document).on('click', '.edit-degree', function(e){
           
            var degreeInstitution = $(this).parent().parent().find('.degree-instituition').text();
            var degreeDescription = $(this).parent().parent().find('.degree-description').text();
            var degreeDuration = $(this).parent().parent().find('.degree-duration').text();
            var degreeCourse = $(this).parent().parent().find('.value-degree-course').text();
            var degreeId = $(this).parent().parent().attr('id');
            
            $(this).parent().parent().replaceWith("<form method=\"post\" accept-charset=\"utf-8\" id=\"form-degree-edit\" action=\"/trainerlink/trainers/edit/#\">" +
                "<div style=\"display:none;\">"+
                "<input type=\"hidden\" name=\"_method\" value=\"POST\">"+
                "<input type=\"hidden\" name=\"degreeid\" value=\""+degreeId+"\">"+
                "</div>"+                        
                "<fieldset>"+
                "<div class=\"input text\">"+
                "<input type=\"text\" value=\""+degreeCourse+"\" name=\"instituition\" class=\"form-control\" placeholder=\"Instituição onde estudou\" id=\"input-add-degree-instituition\">"+
                "</div>"+
                "<div class=\"input text\">"+
                "<input type=\"text\" value=\""+degreeInstitution+"\" name=\"course\" class=\"form-control\" placeholder=\"Nome do curso\" id=\"input-add-degree-course\">"+
                "</div>"+
                "<div class=\"input text\">"+
                "<input type=\"text\" value=\""+degreeDuration+"\" name=\"duration\" class=\"form-control\" placeholder=\"Duração\" id=\"input-add-degree-duration\">"+
                "</div>"+
                "<div class=\"input textarea\">"+
                "<textarea name=\"description\" class=\"form-control\" placeholder=\"Breve descrição\" id=\"input-add-degree-description\" style=\"margin-bottom: 15px\" rows=\"5\">"+degreeDescription+"</textarea>"+
                "</div>"+
                "<input type=\"hidden\" name=\"trainers_id\" value=\"1\">"+                       
                "</fieldset>"+
                "<button id=\"submit-degree\" class=\"btn btn-conf btn-input\" type=\"submit\">Salvar</button>"+                        
                "</form>");
        });
        
         //Form Edit Degree
        $("form-degree-edit").submit(function (event) {
            
            alert("opa", event);

            /*
            //Get fomr data
            var data = $(this).serialize();

            Create a post request
          

            //Get request response
            request.done(function (response) {
                var obj = jQuery.parseJSON(response);
                $("#input-add-degree-instituition").val('');
                $("#input-add-degree-course").val('');
                $("#input-add-degree-duration").val('');
                $("#input-add-degree-description").val('');
                $("#degrees").append("<li class=\"edit degree-info\" id=\"" + obj.id +"\" >" +
                                "<div class=\"block degree-course\">" +
                                "<span style=\"font-weight: 600;\" class=\"value-degree-course\">"+obj.course+"</span>" +
                                "<span class=\"sp-option-menu edit-degree\">editar</span>" +
                                "<span class=\"sp-option-menu delete-degree\">excluir</span>" +
                                "</div>" +
                                "<div class=\"block degree-instituition\">"+
                                 obj.instituition +
                                "</div>" +
                                "<div class=\"block degree-description\">" +
                                 obj.description +
                                "</div>" +
                            "</li>");
            })
            .fail(function () {
                alert("error");
            });
            */
            return false;

        });
        
        //============================End degrre===============
        
        
        //tooltip bootstrap
        $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>

<style>
.navbar-nav {
    float: right;
}

.search-input {
    float: none !important;
    margin-right: 0px !important;
}

.btn-conf {
    padding: 11px 28px 11px 28px !important;
}

.trainer-card{
    border-color: #d9d9d9 !important;
}
</style>
    
<!-- header -->
<?= $this->element('header'); ?>
<!-- end header -->

<section id="content" class="sec-content mg-top-75">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row profile-card profile-inf">
                    <div class="col-md-12 text-center">
                        <div class="foto centered">
                            <?= $this->Html->image('trainer.PNG', ['class'=>'foto-profile img-circle']); ?>
                        </div>
                        <div class="col-md-12 text-center mg-top-15">
                            <h4 class="trainer-name mg-0 edit">Edson Nascimento</h4>
                            <p class="trainer-specialty mg-0 w400 p-inf edit">
                            Personal Trainer
                            </p>
                            <p class="trainer-view text-uppercase mg-0 w400 p-inf edit">
                            cref 12.4523-45
                            </p>
                            <p class="trainer-view mg-0 w400 p-inf edit">Curitiba,PR</h5> 
                                
                            <div class="price-section edit">
                                <p class="w400 mg-0 p-inf">Aulas a partir de </p>
                                <p class="w600 mg-0 p-inf"> R$ 50,00 / hora</p>
                            </div>
                        </div>
                        
                    </div>
                    
                </div><!-- end .row -->
                <div class="row">
                    <div class="col-md-12 text-center btn-contact text-uppercase">
                        <a href="#">Alterar email de contato</a>
                    </div>
                </div>
            </div><!-- end .profile-inf  -->
            <div class="col-md-7 mg-left">
                <div class="row">
                    <div class="col-md-12 profile-card">
                        <h4 class="w400">Sobre o treinador</h4>
                        <hr>
                        <div class="edit edit-bio">
                            Lorem ipsum dolor sit amet, illum decore omittam nec et, eu per semper singulis,
                            inani facete ius ne. Te iriure definiebas reprehendunt per, cum ne quas indoctum,
                            qui et nobis facilis alienum. Nam alii paulo at, vis iriure legimus et, delectus 
                            delicatissimi at vim. Debet munere utroque sit et, solum partem phaedrum eam an, 
                            est brute impetus comprehensam ut.
                            Te vix oratio dissentias, an aliquip antiopam per, an diam clita affert nam. 
                            Fierent scriptorem te duo, ea posse recusabo deseruisse vix. Delenit maluisset ius eu, 
                            ei oratio facilis interpretaris eam. Ex laudem qualisque nec, nihil adipisci referrentur 
                            id sed, mollis tincidunt concludaturque at sed. An error simul vis.
                        </div>
                    </div>
                    <div class="col-md-12 profile-card">
                        <h4 class="w400">Especialidades</h4>
                        <hr>
                        <?php
                           echo $this->Form->input('specialties._ids', [
                            'templates' => [
                                'checkboxWrapper' => '<div class="col-md-3 col-md-4">{{label}}</div>',
                            ],
                            'options' => $specialties,
                            'type' => 'select',
                            'multiple' => 'checkbox',
                            'label' => false,
                        ]);
                        ?>
    
                    </div>
                    <div class="col-md-12 profile-card">
                        <div class="sub-header">
                            <h4 class="w400">Formação</h4> 
                            <span class="tooltip-sub-header">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Falar alguma coisa sobre formação">?</a>
                            </span>
                        </div>
                        <hr>
                        <ul id="degrees">
                            <?php foreach ($trainer->degrees as $degree): ?>
                            <li class="edit degree-info" id="<?= h($degree->id) ?>" >
                                <div class="block degree-course">
                                <span style="font-weight: 600;" class="value-degree-course"><?= h($degree->course) ?></span>
                                <span class="sp-option-menu edit-degree">editar</span>
                                <span class="sp-option-menu delete-degree">excluir</span>
                                </div>
                                <div class="block degree-instituition">
                                    <?= h($degree->instituition) ?>
                                </div>
                                <div class="block degree-description">
                                    <?= h($degree->description) ?>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?=
                        $this->Form->create(null, [
                            'id' => 'form-degree',
                        ])
                        ?>
                        <fieldset>
                            <legend><?= __('Adicionar Formação') ?></legend>
                            <?php
                            echo $this->Form->input('instituition', [
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Instituição onde estudou',
                                    'id'=> 'input-add-degree-instituition'
                                ]);
                            echo $this->Form->input('course',[
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Nome do curso',
                                    'id'=> 'input-add-degree-course'
                                ]);
                            echo $this->Form->input('duration',[
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Duração',
                                    'id'=> 'input-add-degree-duration'
                                ]);
                            
                            echo $this->Form->input('description',[
                                    'type' => 'textarea',
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Breve descrição',
                                    'id'=> 'input-add-degree-description',
                                    'style' => 'margin-bottom: 15px'
                                ]);
                            echo $this->Form->hidden('trainers_id', ['value' => $trainer->id]);
                            ?>
                        </fieldset>
                        <?=
                            $this->Form->button(__('Salvar'), [
                                'id' => 'submit-degree',
                                'class' => 'btn btn-conf btn-input'
                            ])
                            ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="col-md-12 profile-card" >
                        <div class="sub-header">
                            <h4 class="w400">Regiões em que atende</h4> 
                            <span class="tooltip-sub-header"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Falar alguma coisa sobre regiões em que atende">?</a></span>
                        </div>
                        <hr>
                        <ul id="locations">
                            <?php foreach ($trainer->locations as $location): ?>
                            <li class="edit location_name" id="<?= h($location->id) ?>" ><span style="font-weight: 600;" class="value-location"><?= h($location->location) ?></span><span class="sp-option-menu edit-location-name">editar</span><span class="sp-option-menu delete-location-name">excluir</span></li>
                            <?php endforeach; ?>
                        </ul>
                        <div>
                            <?=
                            $this->Form->create(null, [
                                'id' => 'form-location',
                            ])
                            ?>
                            <fieldset>
                                <h4 class="w400"><?= __('Adicionar Região') ?></h4>
                                <?php
                                echo $this->Form->input('location', [
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Digite uma região',
                                    'id'=> 'input-add-location'
                                ]);
                                echo $this->Form->hidden('trainers_id', ['value' => $trainer->id]);
                                ?>
                            </fieldset>
                            <?=
                            $this->Form->button(__('Salvar'), [
                                'id' => 'submit-location',
                                'class' => 'btn btn-conf btn-input'
                            ])
                            ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>

