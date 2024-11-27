<?php
$db = \Config\Database::connect();
if ($db->connID) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error al conectar a la base de datos.";
}

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

        return view('registrar', $data);
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
                'ultimo_inicio_sesion' => date('Y-m-d H:i:s')
            ];

            // Instancia del modelo
            $usuarioModel = new UsuarioModel();

            // Obtener rol_id y estado_id
            $data['rol_id'] = $usuarioModel->obtenerRolId('amigo');
            $data['estado_id'] = $usuarioModel->obtenerEstadoId('activo');

            // Insertar datos
            if ($usuarioModel->insert($data)) {
                // Registro exitoso
                session()->setFlashdata('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
                return redirect()->to(base_url('login'));
            } else {
                // Error en el registro
                session()->setFlashdata('error', 'Hubo un problema al registrar el usuario.');
                return redirect()->to(base_url('usuarios/registro'));
            }
        }
        echo "Cargando el formulario de registro";
        // Mostrar el formulario
        helper('form'); // Cargar el helper
        return view('usuarios/registro');
    }
        
    public function prueba()
    {
        return view('usuarios/prueba'); // Carga app/Views/usuarios/prueba.php
    }

    
    
}
