<?php

namespace App\Controllers;

use App\Models\ArbolesModel;
use App\Models\TreeModel;

class Compras extends BaseController
{
    protected $treeModel;

  
    public function index()
    {
        $arbolesModel = new ArbolesModel();
        $trees = $arbolesModel->getBoughtTrees();

        $data = [
            'title' => 'Árboles Comprados por Amigos',
            'trees' => $trees
        ];

        return view('admin/compra_amigo', $data);
    }
    
    /**
     * Elimina un árbol comprado.
     */
    public function delete($id)
    {
        $this->treeModel->deleteBoughtTree($id);
        return redirect()->to('/compras')->with('msg', 'Árbol eliminado correctamente.');
    }

    /**
     * Muestra el formulario para editar los detalles de un árbol comprado.
     */
    public function edit($id)
    {
        $data['tree'] = $this->treeModel->find($id);

        if (!$data['tree']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Árbol con ID $id no encontrado.");
        }

        return view('admin/compra_amigo', $data);
    }

    /**
     * Actualiza los detalles de un árbol comprado.
     */
    public function update($id)
    {
        $data = [
            'arbol_id' => $this->request->getPost('arbol_id'),
            'user_id' => $this->request->getPost('user_id'),
            'fecha_compra' => $this->request->getPost('fecha_compra')
        ];

        $this->treeModel->editBoughtTree($id, $data);
        return redirect()->to('/compras')->with('msg', 'Árbol actualizado correctamente.');
    }
}
