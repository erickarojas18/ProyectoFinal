<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Amigos extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $amigos = $usuarioModel->findAll();

        $data = [
            'title' => 'Lista de Amigos',
            'amigos' => $amigos
        ];

        return view('admin/lista', $data);
    }

    public function editar($id)
    {
        $usuarioModel = new UsuarioModel();
        $amigo = $usuarioModel->find($id);

        if (!$amigo) {
            return redirect()->to('/amigos')->with('error', 'Amigo no encontrado');
        }

        $data = [
            'title' => 'Editar Amigo',
            'amigo' => $amigo
        ];

        return view('admin/editar', $data);
    }

    public function actualizar($id)
    {
        $usuarioModel = new UsuarioModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellidos' => $this->request->getPost('apellidos'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'direccion' => $this->request->getPost('direccion'),
            'pais' => $this->request->getPost('pais')
        ];

        if ($usuarioModel->update($id, $data)) {
            return redirect()->to('/amigos')->with('success', 'Amigo actualizado correctamente');
        } else {
            return redirect()->to('/amigos')->with('error', 'No se pudo actualizar al amigo');
        }
    }

    public function eliminar($id)
    {
       // Elimina primero las compras asociadas al amigo
    $db = \Config\Database::connect();
    $builder = $db->table('compras');
    $builder->where('user_id', $id);
    $builder->delete(); // Elimina las compras asociadas al amigo

    // Luego elimina el amigo
    $usuarioModel = new UsuarioModel();
    if ($usuarioModel->delete($id)) {
        return redirect()->to('/amigos')->with('success', 'Amigo eliminado correctamente');
    } else {
        return redirect()->to('/amigos')->with('error', 'No se pudo eliminar al amigo');
    }
    }
}
