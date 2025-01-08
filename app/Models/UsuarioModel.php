<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    //SELECT `id`, `id_roles`, `usuario`, `password`, `email`, `created_at`, `updated_at` FROM `usuarios` WHERE 1
    protected $table='usuarios';
    protected $allowedFields=['id_roles','usuario','password','email'];
    
}
?>