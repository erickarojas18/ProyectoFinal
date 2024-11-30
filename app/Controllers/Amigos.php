<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Amigos extends BaseController
{
    public function index()
    {
        // Crear una instancia del modelo
        $usuarioModel = new UsuarioModel();

        // Obtener todos los registros de la tabla amigos
        $amigos = $usuarioModel->findAll();

        // Pasar los datos a la vista
        $data = [
            'title' => 'Lista de Amigos',
            'amigos' => $amigos
        ];

        // Cargar la vista
        return view('usuarios/lista', $data);
    }
}
