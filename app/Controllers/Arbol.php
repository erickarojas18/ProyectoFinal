<?php

namespace App\Controllers;

use App\Models\ArbolDisponibleModel;

use App\Models\ComprasModel;


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
        $session = session();
        $usuario = $session->get('usuario'); // Obtén el usuario desde la sesión
        $userId = is_array($usuario) ? $usuario['id'] : $usuario->id; // Maneja ambos casos

        if (!$userId) {
            return redirect()->to('/login')->with('msg', 'Debes iniciar sesión para comprar un árbol.');
        }

        $arbolModel = new \App\Models\ArbolDisponibleModel();

        // Registrar la compra
        $compraData = [
            'user_id' => $userId,
            'arbol_id' => $id,
            'fecha_compra' => date('Y-m-d H:i:s'),
        ];
        $arbolModel->registrarCompra($compraData);

        // Actualizar el estado del árbol
        $arbolModel->update($id, ['estado' => 0]);

        // Redirige con un mensaje de éxito
        return redirect()->to('/arboles_disponibles')->with('msg', 'Árbol comprado exitosamente.');
    }


    public function arbolesComprados()
    {
        $session = session();
        $usuario = $session->get('usuario'); // Obtener datos del usuario desde la sesión
        $userId = is_array($usuario) ? $usuario['id'] : $usuario->id; // Soporte para array y objeto
    
        if (!$userId) {
            return redirect()->to('/login')->with('msg', 'Debes iniciar sesión para ver tus árboles comprados.');
        }
    
        $compraModel = new ComprasModel();
        $arbolesComprados = $compraModel->cargarArbolesComprados($userId);
    
        return view('usuarios/arboles_comprados', ['arboles' => $arbolesComprados]);
    }
  
    
}
