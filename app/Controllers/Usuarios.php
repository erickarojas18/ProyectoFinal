<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    public function registro()
    {
    
        // Verifica si es un POST
        if ($this->request->getMethod() === 'post') {
            log_message('info', 'Formulario recibido');  // Añadir para depuración
            $model = new UsuarioModel();

            // Reglas de validación
            $validationRules = [
                'nombre'      => 'required|min_length[3]|max_length[50]',
                'apellidos'   => 'required|min_length[3]|max_length[50]',
                'telefono'    => 'required|numeric|min_length[8]|max_length[15]',
                'email'       => 'required|valid_email|max_length[100]',
                'direccion'   => 'required|min_length[5]|max_length[255]',
                'pais'        => 'required|max_length[50]',
                'contraseña'  => 'required|min_length[8]',
            ];

            // Validar datos
            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('error', 'Por favor corrige los errores del formulario.');
            }

            // Datos a insertar
            $data = [
                'nombre'              => $this->request->getPost('nombre'),
                'apellidos'           => $this->request->getPost('apellidos'),
                'telefono'            => $this->request->getPost('telefono'),
                'email'               => $this->request->getPost('email'),
                'direccion'           => $this->request->getPost('direccion'),
                'pais'                => $this->request->getPost('pais'),
                'contraseña'          => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),
                'rol_id'              => 2, // Rol por defecto para "Amigos"
                'estado_id'           => 1, // Estado activo
                'ultimo_inicio_sesion' => null,  // Set a NULL
            ];

            // Insertar en la base de datos
            if ($model->insert($data)) {
                return redirect()->to(base_url('login'))->with('success', 'Usuario registrado exitosamente.');
            } else {
                log_message('error', 'Error al registrar usuario: ' . json_encode($model->errors()));
                return redirect()->back()->withInput()->with('error', 'Ocurrió un error al guardar el usuario.');
            }
            
        }

        // Renderizar vista
        return view('usuarios/registrar');
    }
}
