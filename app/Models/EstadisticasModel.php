<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadisticasModel extends Model
{
    public function contarAmigosRegistrados()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) AS total_amigos FROM amigos WHERE rol_id = 2");
        $result = $query->getRow();
        return $result->total_amigos;
    }

    public function contarArbolesDisponibles()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) AS total_arboles FROM arboles_dispo WHERE estado = 1");
        $result = $query->getRow();
        return $result->total_arboles;
    }

    public function contarArbolesVendidos()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) AS total_vendidos FROM compras");
        $result = $query->getRow();
        return $result->total_vendidos;
    }
}
