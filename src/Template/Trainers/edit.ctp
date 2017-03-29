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
        var trainerJSONData = JSON.parse('<?= json_encode($trainer); ?>');
        console.log( trainerJSONData);
        console.log( trainerJSONData.id );
               
        //=======================Bio edit=================================
        $(document).on('click', '.edit-btn-bio', function(e){
            
            //var curId = $(this).parent().attr('id');
            $('#bio').removeClass('edit');
            $('#bio').removeClass('edit-bio');
            $('.edit-bio-text').replaceWith("<div class=\"form-edit-bio-text\"><form method=\"post\" accept-charset=\"utf-8\" id=\"form-bio-edit\" action=\"/trainerlink/trainers/edit/#\">" +
                    "<textarea name=\"bio\" class=\"form-control\" placeholder=\"Fale um pouco sobre você\" id=\"input-add-bio-text\" style=\"margin-bottom: 15px\" rows=\"10\">"+trainerJSONData.bio+'</textarea>' +
                    "<input type=\"hidden\" name=\"users_id\" value=\"<?= $trainer->id; ?>\"/>" +
                    "<button id=\"submit-degree\" class=\"btn btn-conf btn-input\" type=\"submit\">Salvar</button>"+
                    "</form></div>");
        });
        
        
        $(document).on('submit', '#form-bio-edit', function(e){
            //Get fomr data
            var data = $(this).serialize();
                        
            var bioText = $("#input-add-bio-text").val();

            //Create a post request
            var request = $.post('<?php
                            echo $this->Url->build([
                                'controller' => 'Trainers',
                                'action' => 'editBio'
                            ]);
                            ?>',
                            data);
            
            //Get request response
            request.done(function () {
                $('#bio').addClass('edit');
                $('#bio').addClass('edit-bio');
                trainerJSONData.bio = bioText;
                $('.form-edit-bio-text').replaceWith("<div class=\"edit-bio-text\">"+ bioText +"</div>");

            })
            .fail(function (response) {
                console.log("Error: " + response);
            });
            
            return false;
            
        });
        
        //======================End bio===================================
        //======================Specialties================================
        
        //Add
        $(document).on('click', '.specialtyAdd', function(e){
            //Get fomr data
            var id = $(this).prop("id");
            var specialtyName = $(this).text();
            console.log(specialtyName);
            
            
            var specialtyId = id.split("-")[1];
            
            var div = $(this);
            
            
            //Create a post request
            var request = $.post('<?php
            echo $this->Url->build([
                'controller' => 'Trainers',
                'action' => 'addSpecialty'
            ]);
            ?>',
            {
             trainer_id: <?= $trainer->id?>,
             specialty_id: specialtyId
            });

            //Get request response
            request.done(function (response) {
                div.fadeOut("fast", function() {
                    // Animation complete.
                    div.remove();
                    $("#trainer-speciaties").append("<div class=\"label label-specialties specialtyTrainer\" id=\""+id+"\">"+specialtyName+"</div>");

                });
            })
            .fail(function () {
                alert("error");
            });
            
                        
            
        });
        
        //Remove
        $(document).on('click', '.specialtyTrainer', function(e){
            //Get fomr data
            var id = $(this).prop("id");
            var specialtyName = $(this).text();
            
            var div = $(this);
            
            
            
             var specialtyId = id.split("-")[1];
            
            //Create a post request
            var request = $.post('<?php
            echo $this->Url->build([
                'controller' => 'Trainers',
                'action' => 'deleteSpecialty'
            ]);
            ?>',
            {
             trainer_id: <?= $trainer->id?>,
             specialty_id: specialtyId
            });

            //Get request response
            request.done(function (response) {
                div.fadeOut("fast", function() {
                    // Animation complete.
                    div.remove();
                    $("#speciaties-to-add").append("<div class=\"label label-specialties specialtyAdd\" id=\""+id+"\">"+specialtyName+"</div>");

                });
            })
            .fail(function () {
                alert("error");
            });
            
                        
            
        });
        
        //btn-add-degree
        $(document).on('click', '#btn-add-specialty', function(e){ 
            $("#add-specialty").css("display", "block");
            $("#btn-add-specialty").css("display", "none");
        });
        
        //===================== End specialties ==========================
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
                $("#add-location").css("display", "none");
                $("#btn-add-location").css("display", "block");
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
        
        //btn-add-location
        $(document).on('click', '#btn-add-location', function(e){ 
            $("#add-location").css("display", "block");
            $("#btn-add-location").css("display", "none");
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
                    
             $("#add-degree").css("display", "none");
            $("#btn-add-degree").css("display", "block");
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
                "</div>"+                        
                "<fieldset>"+
                "<div class=\"input text\">"+
                "<input type=\"text\" value=\""+degreeCourse+"\" name=\"course\" class=\"form-control\" placeholder=\"Instituição onde estudou\" id=\"input-add-degree-instituition\">"+
                "</div>"+
                "<div class=\"input text\">"+
                "<input type=\"text\" value=\""+degreeInstitution+"\" name=\"instituition\" class=\"form-control\" placeholder=\"Nome do curso\" id=\"input-add-degree-course\">"+
                "</div>"+
                "<div class=\"input text\">"+
                "<input type=\"text\" value=\""+degreeDuration+"\" name=\"duration\" class=\"form-control\" placeholder=\"Duração\" id=\"input-add-degree-duration\">"+
                "</div>"+
                "<div class=\"input textarea\">"+
                "<textarea name=\"description\" class=\"form-control\" placeholder=\"Breve descrição\" id=\"input-add-degree-description\" style=\"margin-bottom: 15px\" rows=\"5\">"+degreeDescription+"</textarea>"+
                "</div>"+
                "<input type=\"hidden\" name=\"trainers_id\" value=\"<?= $trainer->id?>\">"+   
                "<input type=\"hidden\" name=\"id\" value=\""+degreeId+"\">"+ 
                "</fieldset>"+
                "<button id=\"submit-degree\" class=\"btn btn-conf btn-input\" type=\"submit\">Salvar</button>"+                        
                "</form>");
        });
        
         //Form Edit Degree
        $(document).on('submit', '#form-degree-edit', function(e){ 
            

            
            //Get fomr data
            var data = $(this).serialize();

            //Create a post request
            var request = $.post('<?php
            echo $this->Url->build([
                'controller' => 'Degrees',
                'action' => 'edit'
            ]);
            ?>',
            data);
          

            //Get request response
            request.done(function (response) {
                var obj = jQuery.parseJSON(response);
                $("#form-degree-edit").remove();
            
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
        
        //btn-add-degree
        $(document).on('click', '#btn-add-degree', function(e){ 
            $("#add-degree").css("display", "block");
            $("#btn-add-degree").css("display", "none");
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
                <div >
                    <div class="row profile-card profile-inf">
                        <div class="col-md-12 text-center">
                            <?php
                                echo $this->Html->link(
                                    'Editar',
                                    ['controller' => 'Trainers', 'action' => 'basicProfile', $trainer->id]
                                );
                            ?>
                            <div class="foto centered">
                                <?= $this->element('profile-picture',[
                                    'img_porfile' => $trainer->user->picture
                                ]); ?>
                            </div>
                            <div class="col-md-12 text-center mg-top-15">
                                <h4 class="trainer-name mg-0"><?= $trainer->user->name ?></h4>
                                <p class="trainer-specialty mg-0 w400 p-inf">
                                Personal Trainer
                                </p>
                                <p class="trainer-view text-uppercase mg-0 w400 p-inf">
                                <?= "CREF ".$trainer->CREF ?>
                                </p>
                                <p class="trainer-view mg-0 w400 p-inf"><?= $trainer->user->city->name.','.$trainer->user->state->uf ?></h5> 

                                <div class="price-section">
                                    <p class="w400 mg-0 p-inf">Aulas a partir de </p>
                                    <p class="w600 mg-0 p-inf"> <?= $trainer->average_price ?> / hora</p>
                                </div>
                            </div>

                        </div>

                    </div><!-- end .row -->
                    <div class="row">
                        <div class="col-md-12 text-center btn-contact text-uppercase">
                            <a href="#">Editar email de contato</a>
                        </div>
                    </div>
                </div>
            </div><!-- end .profile-inf  -->
            <div class="col-md-7 mg-left">
                <div class="row">
                    <div class="col-md-12 profile-card">
                        <div class="subtitle-cont">
                            <h4 class="w600 subtitle">Sobre o treinador</h4>
                        </div>
                        <hr>
                        <div class="contn">
                            <div id="bio" class="edit edit-bio">
                                <div class="edit-bio-text">
                                    <?= $trainer->bio ?>
                                </div>
                                <div style="width: 100%; height: 20px;">
                                <span class="sp-option-menu edit-btn-bio">editar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 profile-card">
                        <div class="subtitle-cont">
                        <?= $this->Html->image('especialidades.png'); ?>
                        <h4 class="w600 subtitle">Especialidades</h4>
                        </div>
                        <hr>
                        <div class="contn">
                            <div id="trainer-speciaties">
                                <?php foreach ($trainer->specialties as $specialty): ?>
                                    <div class="label label-specialties specialtyTrainer" id="specialty-<?= h($specialty->id) ?>"><?= h($specialty->name) ?></div>
                                <?php endforeach; ?>
                            </div>
                            <br/>
                            <span class="btn btn-conf btn-input" id="btn-add-specialty">Adicionar Especialidade</span>
                            <div id="add-specialty" class="add-information">
                                <h4 class="w400"><?= __('Adicionar especialidade') ?></h4>
                                <div id="speciaties-to-add">
                                <?php foreach ($specialties as $specialty): ?>
                                    <div  class="label label-specialties specialtyAdd" id="specialty-<?= h($specialty->id) ?>"><?= h($specialty->name) ?></div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 profile-card">
                        <div class="subtitle-cont">
                        <?= $this->Html->image('formacao.png'); ?>
                        <h4 class="w600 subtitle">Formação</h4>
                        <span class="tooltip-sub-header">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Falar alguma coisa sobre formação">?</a>
                            </span>
                        </div>
                        <hr>
                    <div class="contn">
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
                        <span class="btn btn-conf btn-input" id="btn-add-degree">Adicionar Formação</span>
                            <div id="add-degree" class="add-information">
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
                    </div>
                    </div>
                    <div class="col-md-12 profile-card last-card">
                        <div class="subtitle-cont">
                        <?= $this->Html->image('regiao-que-atende.png'); ?>
                        <h4 class="w600 subtitle">Regiões em que atende</h4>
                        <span class="tooltip-sub-header"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Falar alguma coisa sobre regiões em que atende">?</a></span>
                        </div>
                        <hr>
                        <div class="contn">

                        <ul id="locations">
                            <?php foreach ($trainer->locations as $location): ?>
                            <li class="edit location_name" id="<?= h($location->id) ?>" ><span style="font-weight: 600;" class="value-location"><?= h($location->location) ?></span><span class="sp-option-menu edit-location-name">editar</span><span class="sp-option-menu delete-location-name">excluir</span></li>
                            <?php endforeach; ?>
                        </ul>
                            <span class="btn btn-conf btn-input" id="btn-add-location">Adicionar Localização</span>
                            <div id="add-location" class="add-information">
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
    </div>
</section>

