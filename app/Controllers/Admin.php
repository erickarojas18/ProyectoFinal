<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
            // Datos ficticios para acceso temporal
       /* $data = [
            'title' => 'Panel de Administración',
            'user_name' => 'Administrador Temporal', // Nombre ficticio
        ];

        // Cargar la vista con datos ficticios
        return view('admin/dashboard', $data);*/

        // Verificar si el usuario está autenticado y es administrador
        $session = session();
        if (!$session->has('user_id') || $session->get('rol_id') != 1) {
            // Redirigir si no es administrador
            return redirect()->to(base_url('acceso_denegado'));
        }

        // Datos para la vista
        $data = [
            'title' => 'Panel de Administración',
            'user_name' => $session->get('user_name'),
        ];

        // Cargar la vista
        return view('admin/dashboard', $data);       
    
    }
    
}
