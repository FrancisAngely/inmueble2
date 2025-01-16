<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Inmueble_usoModel extends Model
{
    //SELECT `id`, `id_inmuebles`, `fecha_apertura`, `fecha_cierre`, `comentario`, `created_at`, `updated_at` FROM `inmuebles_usos` WHERE 1
    protected $table='inmuebles_usos';
    protected $allowedFields=['id_inmuebles', 'fecha_apertura', 'fecha_cierre', 'comentario', 'documento', 'updated_at'];
    
    
    public function listaInmuebles_usos(){
        $inmuebles=$this
->join('inmuebles','inmuebles_usos.id_inmuebles=inmuebles.id','LEFT')
->select('inmuebles_usos.id,inmuebles_usos.id_inmuebles,inmuebles_usos.fecha_apertura,
inmuebles_usos.fecha_cierre,inmuebles_usos.comentario,inmuebles_usos.documento,inmuebles_usos.updated_at,inmuebles.nombre,inmuebles.nombre as inmueble')
->findAll();
        return $inmuebles;
    }
}
?>