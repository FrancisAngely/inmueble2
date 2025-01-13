<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProvinciaModel;


class ProvinciasController extends BaseController
{
    
     protected $helpers=['form'];
    
    public function index()
    {
        $model=new ProvinciaModel();
        $data['provincias']=$model->findAll();
        
        return view('provinciasListView',$data);
    }
    
    public function nuevo()
    {
        
        return view('rolesNewView');
    }
    
    
     public function crear()
    {
       
         $rules=[
         'role'=>[
             'rules'=>'required|is_unique[roles.role]',
             'errors'=>[
                 'required'=>'Debes introducir un role',
                 'is_unique'=>'El nombre del role ya existe',
             ]
         ],
           
      
       ]; 
        
      $datos=$this->request->getPost(array_keys($rules));
    
     if(!$this->validateData($datos,$rules)){
         return redirect()->back()->withInput();
     }     
         
        $model=new RoleModel();
        $role=$this->request->getvar('role');
         
         $newData=[
             'role'=>$role
         ];
         
         $model->save($newData);
         
         
          return redirect()->to('/roles');
    }
    
    public function editar()
    {
        $model=new ProvinciaModel();
        $id=$this->request->getvar('id');
        $data["datos"]=$model->where('id',$id)->first();
        
        return view('provinciasEditView',$data);
    }
    
    public function actualizar()
    {
       
         $rules=[
         'role'=>[
             'rules'=>'required',
             'errors'=>[
                 'required'=>'Debes introducir un role',
               
             ]
         ],
           
      
       ]; 
        
      $datos=$this->request->getPost(array_keys($rules));
    
     if(!$this->validateData($datos,$rules)){
         return redirect()->back()->withInput();
     }     
         
        $model=new RoleModel();
        $role=$this->request->getvar('role');
        $id=$this->request->getvar('id');
        $model->where('id',$id)
            ->set(['role'=>$role])
            ->update();
         
         
          return redirect()->to('/roles');
    }
   
    
     public function delete()
    {
        $model=new RoleModel();
        $id=$this->request->getvar('id');
       
        $model->where('id', $id)->delete();
         return redirect()->to('/roles');
    }
}
