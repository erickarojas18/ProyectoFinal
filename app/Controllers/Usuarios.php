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
        // Si es un POST, manejar la lógica de registro
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();

            // Validar los datos del formulario
            $validation->setRules([
                'nombre' => 'required|min_length[3]',
                'apellidos' => 'required|min_length[3]',
                'telefono' => 'required|numeric|min_length[10]|max_length[15]',
                'email' => 'required|valid_email',
                'direccion' => 'required',
                'pais' => 'required',
                'password' => 'required|min_length[8]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // En caso de errores, recargar la vista con los errores
                return view('usuarios/registrar', ['validation' => $validation]);
            }

            // Guardar los datos
            $model = new UsuarioModel();
            $model->save([
                'nombre' => $this->request->getPost('nombre'),
                'apellidos' => $this->request->getPost('apellidos'),
                'telefono' => $this->request->getPost('telefono'),
                'email' => $this->request->getPost('email'),
                'direccion' => $this->request->getPost('direccion'),
                'pais' => $this->request->getPost('pais'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            ]);

            return redirect()->to(base_url('usuarios/success'));
        }

        // En GET, mostrar el formulario
        return view('usuarios/registrar');
    }
        
    public function listarUsuarios()
    {
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->findAll();
        return view('usuarios/listar', $data);
    }
    
}
