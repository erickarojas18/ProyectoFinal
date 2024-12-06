<?php

namespace App\Models;

use CodeIgniter\Model;

class ArbolesModel extends Model
{
    protected $table            = 'compras';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['arbol_id', 'user_id', 'fecha_compra'];

     /**
     * Obtener los árboles comprados por los amigos.
     */
    public function getBoughtTrees()
    {
        $builder = $this->db->table('compras c')
            ->select('a.id AS amigo_id, a.nombre, a.apellidos, ad.id AS arbol_id, e.nombre_comercial, e.nombre_cientifico, ad.ubicacion, ad.precio, ad.imagen, c.fecha_compra')
            ->join('arboles_dispo ad', 'c.arbol_id = ad.id')
            ->join('especies e', 'ad.especie = e.id')
            ->join('amigos a', 'c.user_id = a.id');

        return $builder->get()->getResultArray();
    }

    /**
     * Eliminar un árbol comprado.
     */
    public function deleteBoughtTree($id)
    {
        return $this->db->table('compras')->delete(['id' => $id]);
    }

    /**
     * Editar los datos de un árbol comprado.
     */
    public function editBoughtTree($id, $data)
    {
        return $this->db->table('compras')->update($data, ['id' => $id]);
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
