<?php

namespace App\Controllers;

use App\Models\ArbolDisponibleModel;

class Arbol extends BaseController
{
    public function index()
    {
        $arbolModel = new ArbolDisponibleModel();
        $arboles = $arbolModel->cargarArbolesDisponibles();

        return view('usuarios/arboles_disponibles', ['arboles' => $arboles]);
    }

    public function comprar($id)
    {
        $arbolModel = new ArbolDisponibleModel();

        // Actualiza el estado del árbol a 0 (No Disponible)
        $arbolModel->update($id, ['estado' => 0]);

        // Redirige con un mensaje de éxito
        return redirect()->to('/arboles_disponibles')->with('msg', 'Árbol comprado exitosamente.');
    }
}
