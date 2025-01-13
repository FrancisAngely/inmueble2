<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RoleModel;
use App\Models\UsuarioModel;

class UsuariosController extends BaseController
{
    
     protected $helpers=['form', 'comprobar'];
    public function index()
    {
        $model=new UsuarioModel();
        $data['usuarios']=$model->findAll();
        
        return view('usuariosListView',$data);
    }
    
    public function nuevo()
    {
        
        $options=array();
        $options['']="--Select--";
        
        $modelRole=new RoleModel();
        $roles=$modelRole->findAll();
        foreach($roles as $role){
            $options[$role["id"]]=$role["role"];
        }
        $data["optionsRoles"]=$options;
        
        return view('usuariosNewView',$data);
    }
    
    
     public function crear()
    {
       
        
         
         $rules=[
         'usuario'=>[
             'rules'=>'required|is_unique[usuarios.usuario]',
             'errors'=>[
                 'required'=>'Debes introducir un usuario',
                 'is_unique'=>'El nombre del usuario ya existe',
             ]
         ],
          'id_roles'=>[
             'rules'=>'required',
             'errors'=>[
                 'required'=>'Debes seleccionar un role',
             ]
         ],  
      'password'=>[
             'password'=>'required',
             'errors'=>[
                 'required'=>'Debes introducir una contraseña',
             ]
         ],  
       ]; 
        
      $datos=$this->request->getPost(array_keys($rules));
    
     if(!$this->validateData($datos,$rules)){
         return redirect()->back()->withInput();
     }     
          //SELECT `id`, `id_roles`, `usuario`, `password`, `email`, `created_at`, `updated_at` FROM `usuarios` WHERE 1
        $model=new UsuarioModel();
        $id_roles=$this->request->getvar('id_roles');
         $usuario=$this->request->getvar('usuario');
         $password=$this->request->getvar('password');
         $email=$this->request->getvar('email');
         
         $newData=[
             'id_roles'=>$id_roles
             ,'usuario'=>$usuario
             ,'password'=>$password
             ,'email'=>$email
             ,'created_at'=>date("Y-m-d h:i:s")
             ,'updated_at'=>date("Y-m-d h:i:s")
         ];
         
         $model->save($newData);
         
         
          return redirect()->to('/usuarios');
    }
    
    public function editar()
    {
        $model=new UsuarioModel();
        $id=$this->request->getvar('id');
        $data["datos"]=$model->where('id',$id)->first();
        
         $options=array();
        $options['']="--Select--";
        
        $modelRole=new RoleModel();
        $roles=$modelRole->findAll();
        foreach($roles as $role){
            $options[$role["id"]]=$role["role"];
        }
        $data["optionsRoles"]=$options;
        
        return view('usuariosEditView',$data);
    }
    
    public function actualizar()
    {
       
         $rules=[
         'usuario'=>[
             'rules'=>'required',
             'errors'=>[
                 'required'=>'Debes introducir un usuario',
                 'is_unique'=>'El nombre del usuario ya existe',
             ]
         ],
          'id_roles'=>[
             'rules'=>'required',
             'errors'=>[
                 'required'=>'Debes seleccionar un role',
             ]
         ],  
      'password'=>[
             'password'=>'required',
             'errors'=>[
                 'required'=>'Debes introducir una contraseña',
             ]
         ],  
       ]; 
        
      $datos=$this->request->getPost(array_keys($rules));
    
     if(!$this->validateData($datos,$rules)){
         return redirect()->back()->withInput();
     }     
         
        $model=new UsuarioModel();
        $id=$this->request->getvar('id');    
        $id_roles=$this->request->getvar('id_roles');
         $usuario=$this->request->getvar('usuario');
         $password=$this->request->getvar('password');
         $email=$this->request->getvar('email');
        $model->where('id',$id)
            ->set(['id_roles'=>$id_roles,'usuario'=>$usuario,'password'=>$password,'email'=>$email,'updated_at'=>date("Y-m-d h:i:s")])
            ->update();
         
         
          return redirect()->to('/usuarios');
    }
   
    
     public function delete()
    {
        $model=new RoleModel();
        $id=$this->request->getvar('id');
       
        $model->where('id', $id)->delete();
         return redirect()->to('/roles');
    }
}
