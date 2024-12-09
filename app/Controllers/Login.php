<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);  // Cargar helpers necesarios
    }

    public function index()
    {
        return view('pagina_principal');  // Mostrar la vista de login
    }

    public function autenticar()
    {
        $session = session();  // Acceder al servicio de sesión

        $correo = $this->request->getPost('email');  // Obtener el correo del formulario
        $contrasena = $this->request->getPost('contrasena');  // Obtener la contraseña

        $usuarioModel = new LoginModel();  // Cargar el modelo

        // Verificar el usuario y la contraseña
        $usuario = $usuarioModel->verificar_usuario($correo, $contrasena);

        if ($usuario) {
            $session->set('usuario', $usuario);  // Guardar el usuario en la sesión
            // Redirigir según el rol
            if ($usuario->rol_id == 1) {
                return redirect()->to('dashboard');  // Redirigir al menú si el rol es 1
            } elseif ($usuario->rol_id == 2) {
                return redirect()->to('usuarios');  // Redirigir a usuarios si el rol es 2
            }
        } else {
            $session->setFlashdata('error', 'Credenciales incorrectas');
            return redirect()->to('login');  // Redirigir al login si las credenciales son incorrectas
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('usuario');  // Eliminar usuario de la sesión
        return redirect()->to('login');  // Redirigir al login
    }
}
