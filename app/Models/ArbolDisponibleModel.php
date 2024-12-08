<?php

namespace App\Models;

use CodeIgniter\Model;

class ArbolDisponibleModel extends Model
{
    protected $table            = 'arboles_dispo';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['especie', 'ubicacion', 'estado', 'precio', 'imagen', 'tamano'];

    public function cargarArbolesDisponibles()
    {
        return $this->select('arboles_dispo.id, arboles_dispo.especie, especies.nombre_comercial, especies.nombre_cientifico, arboles_dispo.ubicacion, arboles_dispo.estado, arboles_dispo.precio, arboles_dispo.imagen, arboles_dispo.tamano')
                    ->join('especies', 'arboles_dispo.especie = especies.id')
                    ->where('arboles_dispo.estado', 1)
                    ->findAll();
    }
    
   

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
