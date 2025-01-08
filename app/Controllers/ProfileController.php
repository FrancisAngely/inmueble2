<?php

namespace App\Controllers;
use CodeIgniter\Controller;



class ProfileController extends BaseController
{
    public function cerrar_sesion()
    {
     
        $session=session();
                $ses_data=[
                    'id'=>'',
                    'usuario'=>'',
                    'email'=>'',
                    'id_roles'=>'',
                    'role'=>'',
                ];
              
                $session->set($ses_data);
                return redirect()->to('/');
         
    }
    
}
