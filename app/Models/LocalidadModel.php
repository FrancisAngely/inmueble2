<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class LocalidadModel extends Model
{
    //SELECT `id`, `id_provincias`, `cmun`, `dc`, `localidad`, `activo`, `cretead_at`, `updated_at` FROM `localidades` WHERE 1
    protected $table='localidades';
    protected $allowedFields=['id_provincias','cmun','dc','localidad','activo', 'created_at', 'updated_at'];
    
}
?>