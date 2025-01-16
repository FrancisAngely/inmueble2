<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Inmueble_usoModel;
use App\Models\InmuebleModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Files\File;

use Dompdf\Dompdf;
use Dompdf\Options;
class Inmuebles_usosController extends BaseController
{
    
     protected $helpers=['form','comprobar'];
    public function index()
    {
        $model=new Inmueble_usoModel();
        $data['datos']=$model->listaInmuebles_usos();
        
        return view('inmuebles_usosListView',$data);
    }
    
    public function nuevo()
    {
        
        $options=array();
        $options['']="--Select--";
        
        $modelInmueble=new InmuebleModel();
        $inmuebles=$modelInmueble->findAll();
        foreach($inmuebles as $inmueble){
            $options[$inmueble["id"]]=$inmueble["nombre"];
        }
        $data["optionsInmuebles"]=$options;
        
        return view('inmuebles_usosNewView',$data);
    }
    
    
     public function crear()
    {
       
        
         
         $rules=[
         'id_inmuebles'=>[
             'rules'=>'required',
             'errors'=>[
                 'required'=>'Debes seleccionar un inmueble',
             ]
         ],
          'fecha_apertura'=>[
             'rules'=>'required|valid_date',
             'errors'=>[
                 'required'=>'Debe seleccionar una fecha de apertura',
                 'valid_date'=>'La fecha de apertura tiene un formato incorrecto',
             ]
         ],  
            'fecha_cierre'=>[
             'rules'=>$this->request->getvar('fecha_cierre')<>'' ? 'valid_date|fecha_mayor['.$this->request->getvar('fecha_apertura').']':'permit_empty',
             'errors'=>[
                 'valid_date'=>'La fecha de cierre tiene un formato incorrecto',
                 'fecha_mayor'=>'La fecha de cierre tiene que ser mayor que fecha apertura',
             ]
         ],  
      
           'documento'=>[
             'rules'=>'mime_in[documento,application/pdf]|ext_in[documento,pdf]',
             'errors'=>[
                 'mime_in'=>'No pdf',
                 'ext_in'=>'No pdf',
             ]
         ],    
             
             
           
       ]; 
        
      $datos=$this->request->getPost(array_keys($rules));
    
     if(!$this->validateData($datos,$rules)){
         return redirect()->back()->withInput();
     }     
        // SELECT `id`, `id_inmuebles`, `fecha_apertura`, `fecha_cierre`, `comentario`, `created_at`, `updated_at` FROM `inmuebles_usos` WHERE 1
        $model=new Inmueble_usoModel();
        $id_inmuebles=$this->request->getvar('id_inmuebles');
         $fecha_apertura=$this->request->getvar('fecha_apertura');
         $fecha_cierre=$this->request->getvar('fecha_cierre');
         $comentario=$this->request->getvar('comentario');
         
         $newData=[
             'id_inmuebles'=>$id_inmuebles
             ,'fecha_apertura'=>$fecha_apertura
             ,'fecha_cierre'=>$fecha_cierre
             ,'comentario'=>$comentario
             ,'documento'=>''
             ,'created_at'=>date("Y-m-d h:i:s")
             ,'updated_at'=>date("Y-m-d h:i:s")
         ];
         
         if($model->save($newData)){
             if($this->request->getFile('documento')!=""){
                 $uso_id=$model->getInsertID();
                 
                 $documento=$this->request->getFile('documento');
                 $ext=$documento->guessExtension();
                 
                 $nameDocumentoFile="Uso_".$uso_id.".".$ext;
                 $documento->move(ROOTPATH.'public/uploads',$nameDocumentoFile);
                 
                 $filepath='public/uploads/'.$nameDocumentoFile;
                 
            $model->where('id',$uso_id)
            ->set(['documento'=>$filepath])
            ->update();
                 
             }
         }
         
         
          return redirect()->to('/inmuebles_usos');
    }
    
    public function editar()
    {
        $model=new Inmueble_usoModel();
        $id=$this->request->getvar('id');
        $data["datos"]=$model->where('id',$id)->first();
        
         $options=array();
        $options['']="--Select--";
        
        $modelInmueble=new InmuebleModel();
        $inmuebles=$modelInmueble->findAll();
        foreach($inmuebles as $inmueble){
            $options[$inmueble["id"]]=$inmueble["nombre"];
        }
        $data["optionsInmuebles"]=$options;
        
        return view('inmuebles_usosEditView',$data);
    }
    
    public function actualizar()
    {
       
          $rules=[
         'id_inmuebles'=>[
             'rules'=>'required',
             'errors'=>[
                 'required'=>'Debes seleccionar un inmueble',
             ]
         ],
          'fecha_apertura'=>[
             'rules'=>'required|valid_date',
             'errors'=>[
                 'required'=>'Debe seleccionar una fecha de apertura',
                 'valid_date'=>'La fecha de apertura tiene un formato incorrecto',
             ]
         ],  
            'fecha_cierre'=>[
             'rules'=>$this->request->getvar('fecha_cierre')<>'' ? 'valid_date|fecha_mayor['.$this->request->getvar('fecha_apertura').']':'permit_empty',
             'errors'=>[
                 'valid_date'=>'La fecha de cierre tiene un formato incorrecto',
                 'fecha_mayor'=>'La fecha de cierre tiene que ser mayor que fecha apertura',
             ]
         ],  
      
       ]; 
        
      $datos=$this->request->getPost(array_keys($rules));
    
     if(!$this->validateData($datos,$rules)){
         return redirect()->back()->withInput();
     }     
         
      
         
         $model=new Inmueble_usoModel();
         $id=$this->request->getvar('id');  
        $id_inmuebles=$this->request->getvar('id_inmuebles');
         $fecha_apertura=$this->request->getvar('fecha_apertura');
         $fecha_cierre=$this->request->getvar('fecha_cierre');
         $comentario=$this->request->getvar('comentario');
        
           // SELECT `id`, `id_inmuebles`, `fecha_apertura`, `fecha_cierre`, `comentario`, `created_at`, `updated_at` FROM `inmuebles_usos` WHERE 1
        $model->where('id',$id)
            ->set(['id_inmuebles'=>$id_inmuebles,'fecha_apertura'=>$fecha_apertura,'fecha_cierre'=>$fecha_cierre,'comentario'=>$comentario,'updated_at'=>date("Y-m-d h:i:s")])
            ->update();
         
         
          return redirect()->to('/inmuebles_usos');
    }
   
    
     public function delete()
    {
        $model=new Inmueble_usoModel();
        $id=$this->request->getvar('id');
       
       if($model->where('id', $id)->delete()) echo 1;
         else echo 0;
        // return redirect()->to('/roles');
    }
    
    public function exportar()
    {
        $model=new Inmueble_usoModel();
        $datos=$model->listaInmuebles_usos();
        //`id_roles`, `usuario`, `password`, `email`
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
        
           // SELECT `id`, `id_inmuebles`, `fecha_apertura`, `fecha_cierre`, `comentario`, `created_at`, `updated_at` FROM `inmuebles_usos` WHERE 1
            $sheet->setCellValue('A1', 'Inmueble');
            $sheet->setCellValue('B1', 'fecha_apertura');
            $sheet->setCellValue('C1', 'fecha_cierre');
            $sheet->setCellValue('D1', 'comentario');
            $count=2;
            foreach($datos as $dato){
                $sheet->setCellValue('A'.$count, $dato['inmueble']);
                $sheet->setCellValue('B'.$count, $dato['fecha_apertura']);
                $sheet->setCellValue('C'.$count, $dato['fecha_cierre']);
                $sheet->setCellValue('D'.$count, $dato ['comentario']);
                $count++;
            }
        
        
        $writer = new Xlsx($spreadsheet);
            $writer->save('inmuebles.xlsx');
            header("Content-Type:   application/vnd.ms-excel");
            header("Content-Disposition:attachment; filename=inmuebles.xlsx");
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate");
            header("Content-Length: ".filesize("inmuebles.xlsx"));
            //flush();
            ob_clean(); 
            readfile("inmuebles.xlsx");
            //    header("Location: ".baseUrl()."/inmuebles.xlsx");
            exit;
        
            
    }
    
    public function imprimir()
    {
        
        $options=new Options();
        $options->set('isRemoteEnabled',true);
        $dompdf=new Dompdf($options);
        
        //$html='<h1>Hola, mundo</h1>';
        $data["texto"]="PRUEBA DE CONTENIDO";
        $html=view('printView',$data);
        
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("prueba.pdf",['Attachment'=>false]);
    }
}
