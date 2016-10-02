<section id="search-bar">
    <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 centered">
              <form method="get" accept-charset="utf-8" action="/trainerlink/trainers/search" class="form-inline">            
                    <div class="col-md-5" >
                        <select name="specialties" class="search-input form-control" placeholder="O que você procura?" id="specialties">
                            <option value="0">O que você procura?</option>
                        </select>
                    </div>            
                    <div class="col-md-5">
                        <?php if(isset($city)): ?>
                            <input type="text" name="city" id="Autocomplete" class="search-input ui-autocomplete-input form-control" placeholder="Digite uma cidade" autocomplete="off" value="<?=$city?>">
                        <?php else: ?>
                            <input type="text" name="city" id="Autocomplete" class="search-input ui-autocomplete-input form-control" placeholder="Digite uma cidade" autocomplete="off">
                        <?php endif; ?>
                    </div>            
                    <input type="hidden" name="genre" id="city" value="3">            
                    <input type="hidden" name="section_type" id="city" value="both">       
                    <div class="col-md-2">
                    <button class="btn btn-conf btn-input" type="submit">Buscar</button>         
                    </div>
                </form>
          </div><!--/.col-->
        </div><!--/.row-->
    </div>
</section><!--/#search-bar-->