<?php
    if($img_porfile != 'NULL' || $img_porfile != ''){
        echo $this->Html->image('profile_pictures/'.$img_porfile , ['class'=>'foto-profile img-circle']);
    }else{
         echo $this->Html->image('trainer.PNG' , ['class'=>'foto-profile img-circle']);
    }

