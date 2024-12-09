<?php

namespace App\Models;

use CodeIgniter\Model;

class VistaModel extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array'; // Cambiar a 'object' si prefieres objetos
    protected $allowedFields = ['user_id', 'arbol_id', 'fecha_compra'];
    
    public function cargarArbolesCompradosA()
    {
        return $this
            ->select('compras.id, compras.user_id, compras.fecha_compra, arboles_dispo.especie, arboles_dispo.ubicacion, 
                      arboles_dispo.precio, arboles_dispo.imagen, arboles_dispo.tamano, 
                      especies.nombre_comercial, especies.nombre_cientifico')
            ->join('arboles_dispo', 'compras.arbol_id = arboles_dispo.id')
            ->join('especies', 'arboles_dispo.especie = especies.id')
            ->findAll();
    }
}
