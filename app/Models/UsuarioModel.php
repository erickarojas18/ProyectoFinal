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

        public function testConnection()
    {
        try {
            // Inicializar conexión a la base de datos
            $this->db->initialize();

            // Verificar si la conexión es válida
            if (!$this->db->connID) {
                return 'Error en la conexión: ' . $this->db->error();
            }
            return null; // Conexión exitosa
        } catch (\Throwable $e) {
            return 'Excepción en la conexión: ' . $e->getMessage();
        }
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
