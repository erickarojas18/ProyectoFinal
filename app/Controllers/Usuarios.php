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

        return view('pagina_principal', $data);
    }
    public function registrar()

    {
        if ($this->request->getMethod() == 'post') {
            $usuarioModel = new UsuarioModel();

            // Capturar datos del formulario
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'apellidos' => $this->request->getPost('apellidos'),
                'telefono' => $this->request->getPost('telefono'),
                'email' => $this->request->getPost('email'),
                'direccion' => $this->request->getPost('direccion'),
                'pais' => $this->request->getPost('pais'),
                'contraseña' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'rol_id' => $usuarioModel->obtenerRolId('amigo'),
                'estado_id' => $usuarioModel->obtenerEstadoId('activo'),
                'ultimo_inicio_sesion' => date('Y-m-d H:i:s')
            ];

            // Guardar en la base de datos
            if ($usuarioModel->insert($data)) {
                session()->setFlashdata('registro_exitoso', '¡Registro exitoso! Ahora puedes iniciar sesión.');
                return redirect()->to(base_url('usuarios/login'));
            } else {
                return redirect()->back()->with('error', 'Error al registrar usuario.');
            }
        }

        return view('usuarios/registrar');
        
    }
    public function listarUsuarios()
    {
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->findAll();
        return view('usuarios/listar', $data);
    }
    
}
