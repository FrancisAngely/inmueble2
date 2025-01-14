<?php
use CodeIgniter\CodeIgniter;

if(!function_exists('baseUrl')){
    function baseUrl(){
        $baseUrl="http://localhost/inmuebles2";
        return $baseUrl;
    }
}


if(!function_exists('cambiaf_a_espanol')){
    function cambiaf_a_espanol($fecha){
    if($fecha!=""){
    preg_match( '/([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})/', $fecha, $mifecha);
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
    return $lafecha;
    }else return "";
    }
}

if(!function_exists('cambiarFormatoAMysql')){
    function cambiarFormatoAMysql($fecha){
    preg_match( '/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2,4})/', $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
    return $lafecha;
    }
}
?>