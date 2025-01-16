<?php
namespace App\Validation;
use CodeIgniter\I18n\Time;
class Reglas{

 public function fecha_mayor($str,$str2){
        $date1=Time::parse($str,'Europe/Madrid');
        $date2=Time::parse($str2,'Europe/Madrid');
        
        //$diff=$date1->difference($date2);
        
        if($date1>$date2)
            return true;
        else
            return false;
    }
}

?>





