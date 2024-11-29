<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class Usuarios extends BaseController
{
    public function index(): string
    {
        $error_msg = session()->getFlashdata('error') ?? '';
        $data = [
            'title' => 'Registro de Usuario - Sign Up',
            'error_msg' => $error_msg
        ];

        return view('usuarios/registrar', $data);
    }
    public function registrar()
    {
        if ($this->request->getMethod() === 'post') {
            // Capturar datos del formulario
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'apellidos' => $this->request->getPost('apellidos'),
                'telefono' => $this->request->getPost('telefono'),
                'email' => $this->request->getPost('email'),
                'direccion' => $this->request->getPost('direccion'),
                'pais' => $this->request->getPost('pais'),
                'contraseña' => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),
                'ultimo_inicio_sesion' => date('Y-m-d H:i:s'),
                'rol_id' => 2, // Asignar por defecto el rol de "amigo"
                'estado_id' => 1 // Asignar por defecto el estado "activo"
            ];
    
            // Instancia del modelo
            $usuarioModel = new UsuarioModel();
    
            // Insertar datos
            if ($usuarioModel->insert($data)) {
                // Registro exitoso
                session()->setFlashdata('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
                return redirect()->to(base_url('login'));
            } else {
                // Error en el registro
                $errors = $usuarioModel->errors(); // Captura posibles errores
                session()->setFlashdata('error', 'Hubo un problema al registrar el usuario. ' . implode(', ', $errors));
                return redirect()->to(base_url('usuarios/registrar'));
            }
        }
    
        // Si no es POST, mostrar el formulario
        return view('usuarios/registrar');
    }
    
    
}
