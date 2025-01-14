<?php
use CodeIgniter\CodeIgniter;

if(!function_exists('rellenarDato')){
    function rellenarDato($errors,$datos,$campo){
        $valor="";
        if(isset($errors[$campo])) 
            $valor=$datos[$campo]; 
        else { 
        if(set_value($campo)!="")  $valor=set_value($campo);
        else  $valor=$datos[$campo]; 
       
        }
         return $valor;
    }
}


?>

