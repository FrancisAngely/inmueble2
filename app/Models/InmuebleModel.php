<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class InmuebleModel extends Model
{
    //SELECT `id`, `nombre`, `id_provincias`, `id_localidades`, `tipo_via`, `direccion`, `cp`, `numero`, `piso`, `letra`, `escalera`, `precio`, `habitaciones`, `metros_cuadrados`, `exterior`, `aseos`, `terraza`, `balcon`, `orientacion`, `ascensor`, `descripcion`, `foto`, `created_at`, `updated_at` FROM `inmuebles` WHERE 1
    protected $table='inmuebles';
    protected $allowedFields=['nombre', 'id_provincias', 'id_localidades', 'tipo_via', 'direccion', 'cp', 'numero', 'piso', 'letra', 'escalera', 'precio', 'habitaciones', 'metros_cuadrados', 'exterior', 'aseos', 'terraza', 'balcon', 'orientacion', 'ascensor', 'descripcion', 'foto', 'created_at', 'updated_at'];
    
}
?>