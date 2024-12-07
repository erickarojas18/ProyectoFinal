<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArbolDisponibleModel;

class ArbolesDisponibles extends BaseController
{
    public function index()
    {
        $arbolModel = new ArbolDisponibleModel();
        $arboles = $arbolModel->cargarArbolesDisponibles();

        $data = [
            'title' => 'Árboles Disponibles',
            'arboles' => $arboles
        ];

        return view('admin/adm_arboles', $data);
    }

    public function editar($id)
    {
        $arbolModel = new ArbolDisponibleModel();
        $arbol = $arbolModel->find($id);

        if (!$arbol) {
            return redirect()->to('/arbol')->with('error', 'Árbol no encontrado.');
        }

        $data = [
            'title' => 'Editar Árbol',
            'arbol' => $arbol
        ];

        return view('admin/editar_arbol', $data);
    }

    public function actualizar($id)
    {
        $arbolModel = new ArbolDisponibleModel();

        $data = $this->request->getPost();

        if (!$arbolModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $arbolModel->errors());
        }

        return redirect()->to('/arbol')->with('success', 'Árbol actualizado correctamente.');
    }
    public function eliminar($id)
    {
        $arbolModel = new ArbolDisponibleModel();

        // Verifica si el árbol existe antes de intentar eliminarlo
        $arbol = $arbolModel->find($id);
        if (!$arbol) {
            return redirect()->to('/arbol')->with('error', 'Árbol no encontrado.');
        }

        // Intenta eliminar el árbol
        if (!$arbolModel->delete($id)) {
            return redirect()->to('/arbol')->with('error', 'No se pudo eliminar el árbol.');
        }

        return redirect()->to('/arbol')->with('success', 'Árbol eliminado correctamente.');
    }
}

