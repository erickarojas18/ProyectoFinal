<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        // Capturar mensaje de error (si existe)
        $error_msg = session()->getFlashdata('error_msg');

        // Mostrar la vista de inicio de sesión
        return view('pagina_principal', ['error_msg' => $error_msg]);
    }

    public function autenticar()
    {
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->getUsuarioByEmail($email);

            if ($usuario && password_verify($password, $usuario['contraseña'])) {
                // Configurar datos de sesión
                session()->set([
                    'user_id' => $usuario['id'],
                    'user_name' => $usuario['nombre'],
                    'rol_id' => $usuario['rol_id'],
                    'is_logged_in' => true
                ]);

                // Redirigir según el rol
                if ($usuario['rol_id'] == 1) {
                    return redirect()->to(base_url('admin'));
                } elseif ($usuario['rol_id'] == 2) {
                    return redirect()->to(base_url('amigo'));
                }
            } else {
                // Establecer mensaje de error y redirigir
                session()->setFlashdata('error_msg', 'Credenciales incorrectas.');
                return redirect()->to(base_url('login'));
            }
        }

        return redirect()->to(base_url('login'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
