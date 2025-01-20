<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RoleModel;
use App\Models\UsuarioModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UsuariosController extends BaseController
{
    
     protected $helpers=['form','comprobar'];
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
        $model=new UsuarioModel();
        $id=$this->request->getvar('id');
       
       if($model->where('id', $id)->delete()) echo 1;
         else echo 0;
        // return redirect()->to('/roles');
    }
    
    public function exportar()
    {
        $model=new UsuarioModel();
        $usuarios=$model->findAll();
        //`id_roles`, `usuario`, `password`, `email`
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
        
            $sheet->setCellValue('A1', 'Role');
            $sheet->setCellValue('B1', 'usuario');
            $sheet->setCellValue('C1', 'password');
            $sheet->setCellValue('D1', 'email');
            $count=2;
            foreach($usuarios as $usuario){
                $sheet->setCellValue('A'.$count, $usuario['id_roles']);
                $sheet->setCellValue('B'.$count, $usuario['usuario']);
                $sheet->setCellValue('C'.$count, $usuario['password']);
                $sheet->setCellValue('D'.$count, $usuario['email']);
                $count++;
            }
        
        
        $writer = new Xlsx($spreadsheet);
            $writer->save('usuarios.xlsx');
            header("Content-Type:   application/vnd.ms-excel");
            header("Content-Disposition:attachment; filename=usuarios.xlsx");
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate");
            header("Content-Length: ".filesize("usuarios.xlsx"));
            flush();
            readfile("usuarios.xlsx");
            exit;
        
            
    }
    
     public function grafica()
    {
         $model=new UsuarioModel();
         $usuarios=$model->datosgrafica();
         $data["datos"]=$usuarios;
         $datalabel=array();
         $ticks=array();
         if(count($usuarios)>0){
             $i=1;
             foreach($usuarios as $user){
                 array_push($datalabel,"[".$i.",".$user["numUsuarios"]."]");
                 array_push($ticks,"[".$i.",'".$user["role"]."']");
                 $i++;
             }
         }
         $datalabel=implode(",",$datalabel);
         $ticks=implode(",",$ticks);
         $data["datalabel"]=$datalabel;
         $data["ticks"]=$ticks;
       return view('graficaView',$data);
    }
    public function grafica2()
    {
         $model=new UsuarioModel();
         $usuarios=$model->datosgrafica();
         $data["datos"]=$usuarios;
         $xValues=array();
         $yValues=array();
         $colores='"red", "green","blue","orange","brown"';
        
    //"red", "green","blue","orange","brown"
         if(count($usuarios)>0){
             $i=0;
             foreach($usuarios as $user){
                 array_push($yValues,$user["numUsuarios"]);
                 array_push($xValues,"'".$user["role"]."'");
                  
                 $i++;
             }
         }
         $yValues=implode(",",$yValues);
         $xValues=implode(",",$xValues);
         // $colores=implode(",",$colores);
         $data["yValues"]=$yValues;
         $data["xValues"]=$xValues;
        $data["colores"]=$colores;
       return view('graficaPieView',$data);
    }
     public function grafica3()
    {
         $model=new UsuarioModel();
         $usuarios=$model->datosgrafica();
         $data["datos"]=$usuarios;
         $datalabel=array();
         $ticks=array();
         if(count($usuarios)>0){
             $i=1;
             foreach($usuarios as $user){
                 array_push($datalabel,"[".$i.",".$user["numUsuarios"]."]");
                 array_push($ticks,"[".$i.",'".$user["role"]."']");
                 $i++;
             }
         }
         $datalabel=implode(",",$datalabel);
         $ticks=implode(",",$ticks);
         $data["datalabel"]=$datalabel;
         $data["ticks"]=$ticks;
       return view('graficaLineView',$data);
    }
    
    
     public function graficas()
    {
         $model=new UsuarioModel();
         $usuarios=$model->datosgrafica();
         $data["datos"]=$usuarios;
         $datalabel=array();
         $ticks=array();
         if(count($usuarios)>0){
             $i=1;
             foreach($usuarios as $user){
                 array_push($datalabel,"[".$i.",".$user["numUsuarios"]."]");
                 array_push($ticks,"[".$i.",'".$user["role"]."']");
                 $i++;
             }
         }
         $datalabel=implode(",",$datalabel);
         $ticks=implode(",",$ticks);
         $data["datalabel"]=$datalabel;
         $data["ticks"]=$ticks;
         $data["idGrafBarra"]="id1";
         $dataC["grafica1"]=view('graf_barraView',$data);
          $data["idGrafBarra"]="id2";
         $dataC["grafica2"]=view('graf_barraView',$data);
         
         $xValues=array();
          $yValues=array();
         $colores='"red", "green","blue","orange","brown"';
        
    //"red", "green","blue","orange","brown"
         if(count($usuarios)>0){
             $i=0;
             foreach($usuarios as $user){
                 array_push($yValues,$user["numUsuarios"]);
                 array_push($xValues,"'".$user["role"]."'");
                  
                 $i++;
             }
         }
         $yValues=implode(",",$yValues);
         $xValues=implode(",",$xValues);
         // $colores=implode(",",$colores);
         $data["yValues"]=$yValues;
         $data["xValues"]=$xValues;
        $data["colores"]=$colores;
         $data["idGrafPie"]="id3";
       $dataC["grafica3"]=view('graf_pieView',$data);
         
         $data["idGrafLine"]="id4";
        $dataC["grafica4"]=view('graf_LineView',$data);
         
       return view('graficasView',$dataC);
    }
}
