<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    //SELECT `id`, `id_roles`, `usuario`, `password`, `email`, `created_at`, `updated_at` FROM `usuarios` WHERE 1
    protected $table='usuarios';
    protected $allowedFields=['id_roles','usuario','password','email', 'created_at', 'updated_at'];
    
    
     public function datosgrafica(){
         //SELECT `id`, `id_roles`, `usuario`, `password`, `email`, `created_at`, `updated_at` FROM `usuarios` WHERE 1
         
         //SELECT `id`, `role`, `created_at`, `updated_at` FROM `roles` WHERE 1
            $sql=" SELECT  roles.role, COUNT(usuarios.id_roles) as numUsuarios FROM `usuarios`";
            $sql.=" INNER JOIN roles ON  usuarios.id_roles=roles.id";
            $sql.=" GROUP BY (usuarios.id_roles)";
            $sql.=" ORDER BY (roles.id) asc";
         
            $query=$this->query($sql);
            $datos=array();
            
            if($query->getResult()){
                $datos=$query->getResultArray();
            }
         
         return $datos;
         
     }
}
?>