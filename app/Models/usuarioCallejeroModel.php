<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'callejero';
    protected $allowedFields = [
        'id',
        'id_localidades',
        'tipo_via',
        'denominacion',
        'barrio_rural',
        'cp',
        'created_at',
        'updated_at'
    ];


    public function datosgrafica()
    {

        $sql = " SELECT barrio_rural, COUNT(id) AS numBarrios FROM callejero";
        $sql .= " GROUP BY barrio_rural";
        $sql .= " ORDER BY numBarrios DESC;";

        $query = $this->query($sql);
        $datos = array();

        if ($query->getResult()) {
            $datos = $query->getResultArray();
        }

        return $datos;
    }
}
