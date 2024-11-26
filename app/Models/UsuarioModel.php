<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'amigos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nombre', 'apellidos', 'telefono', 'email', 'direccion', 
        'pais', 'contraseña', 'rol_id', 'estado_id',
        'ultimo_inicio_sesion'];



        public function obtenerRolId($tipo)
        {
            $db = \Config\Database::connect();
            $query = $db->table('roles')->select('id')->where('tipo', $tipo)->get();
            $result = $query->getRow();
            return $result ? $result->id : null;
        }
    
        public function obtenerEstadoId($estado)
        {
            $db = \Config\Database::connect();
            $query = $db->table('estado')->select('id')->where('estado', $estado)->get();
            $result = $query->getRow();
            return $result ? $result->id : null;
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
