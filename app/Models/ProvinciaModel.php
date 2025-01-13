<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ProvinciaModel extends Model
{
    //SELECT `id`, `provincia`, `activo`, `created_at`, `updated_at` FROM `provincias` WHERE 1
    protected $table='provincias';
    protected $allowedFields=['provincia','activo', 'created_at', 'updated_at'];
    
}
?>