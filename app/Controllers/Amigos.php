<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Amigos extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $amigos = $usuarioModel->findAll(); // Obtiene todos los amigos de la base de datos


        $data = [
            'title' => 'Lista de Amigos',
            'amigos' => $amigos
        ];

        return view('admin/lista', $data); // Renderiza la vista con los datos de amigos
    }

    public function editar($id)
    {
        $usuarioModel = new UsuarioModel();
        $amigo = $usuarioModel->find($id); // Busca un amigo por su ID

        // Podrías validar que el ID sea válido y no nulo antes de buscarlo en la base de datos
        if (!$amigo) {
            return redirect()->to('/amigos')->with('error', 'Amigo no encontrado'); // Maneja el caso donde no se encuentre el amigo
        }

        $data = [
            'title' => 'Editar Amigo',
            'amigo' => $amigo
        ];

        return view('admin/editar', $data); // Renderiza la vista para editar el amigo
    }

    public function actualizar($id)
    {
        $usuarioModel = new UsuarioModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'), // Obtiene el nombre del formulario
            'apellidos' => $this->request->getPost('apellidos'), // Obtiene los apellidos del formulario
            'telefono' => $this->request->getPost('telefono'), // Obtiene el teléfono del formulario
            'email' => $this->request->getPost('email'), // Obtiene el email del formulario
            'direccion' => $this->request->getPost('direccion'), // Obtiene la dirección del formulario
            'pais' => $this->request->getPost('pais') // Obtiene el país del formulario
        ];

      

        if ($usuarioModel->update($id, $data)) {
            return redirect()->to('/amigos')->with('success', 'Amigo actualizado correctamente'); // Mensaje de éxito
        } else {
            return redirect()->to('/amigos')->with('error', 'No se pudo actualizar al amigo'); // Mensaje de error
        }
    }

    public function eliminar($id)
    {
        // Elimina primero las compras asociadas al amigo
        $db = \Config\Database::connect();
        $builder = $db->table('compras');
        $builder->where('user_id', $id); // Filtra las compras por el ID del usuario
        $builder->delete(); // Elimina las compras asociadas al amigo

        // Podrías revisar si necesitas manejar relaciones en cascada para evitar inconsistencias

        // Luego elimina el amigo
        $usuarioModel = new UsuarioModel();
        if ($usuarioModel->delete($id)) {
            return redirect()->to('/amigos')->with('success', 'Amigo eliminado correctamente'); // Mensaje de éxito
        } else {
            return redirect()->to('/amigos')->with('error', 'No se pudo eliminar al amigo'); // Mensaje de error
        }
    }
}
