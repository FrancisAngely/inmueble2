<?php

namespace App\Controllers;

class Home extends BaseController
{
     protected $helpers=['form'];
    public function index()
    {
        /*$session=session();
      
        if($session->get('usuario')==NULL)
             return view('loginView');*/
        
        return view('inicio');
    }
     public function inicio()
    {
        $data["mensaje"]="Hola,";
        $data["mensaje2"]="mundo";
         return view('inicio',$data);
    }
    
    
    public function inicioGet()
    {
        $id=$this->request->getVar('id');
       
        $data["mensaje"]=$id;
        $data["mensaje2"]="";
         return view('inicio',$data);
    }
    
     public function formulario(): string
    {
        //breadcrumb
         $data["titulo"]="Formulario";
         $data["item_active"]="Formulario";
         
         $data["item1"]="Roles";
         $data["itemhref1"]="/roles";
         
         $data["item2"]="Inicio";
         $data["itemhref2"]="/inicio";
         
         $data["numitem"]="2";
         
         return view('formulario',$data);
    }
    
    
    public function comprobar()
    {
         $id=$this->request->getVar('id');
        $usuario=$this->request->getVar('usuario');
        $password=$this->request->getVar('password');
       
       echo $id."_".$usuario."-".$password;
         //return view('formulario');
        return redirect()->to("/inicio");
    }
}
