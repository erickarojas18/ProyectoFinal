<?php

namespace App\Controllers;


use App\Models\VistaModel;
use App\Models\ArbolDisponibleModel;


class Vista extends BaseController
{

    // Método para mostrar los árboles comprados por los amigos
    public function index()
    {
        // Obtener el modelo de Compras
        $compraModel = new VistaModel();

        // Cargar los árboles comprados por todos los usuarios
        $arbolesComprados = $compraModel->cargarArbolesCompradosA(); // Método que cargará todos los árboles comprados por cualquier usuario

        // Pasar los datos a la vista
        return view('admin/adm_arbol_amigo', ['arboles' => $arbolesComprados]);
    }

// Método para mostrar los árboles comprados por los amigos
    public function arbolesCompradosPorAmigos()
    {
        // Obtener el modelo de Compras
        $compraModel = new VistaModel();

        // Cargar los árboles comprados por todos los usuarios
        $arbolesComprados = $compraModel->cargarArbolesCompradosA(); // Método que cargará todos los árboles comprados por cualquier usuario

        // Pasar los datos a la vista
        return view('usuarios/arboles_comprados', ['arboles' => $arbolesComprados]);
    }


    // Método para editar un árbol
    public function editarArbol($id)
    {
        $compraModel = new ArbolDisponibleModel();
        $arbol = $compraModel->find($id);
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recoger los datos del formulario
            $data = [
                'tamano' => $this->request->getPost('tamano'),
                'especie' => $this->request->getPost('especie'),
                'ubicacion' => $this->request->getPost('ubicacion'),
                'precio' => $this->request->getPost('precio'),
                'estado' => $this->request->getPost('estado')
            ];
    
            // Manejo de la imagen
            $imagen = $this->request->getFile('imagen');
            if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
                // Generar un nombre aleatorio para la imagen
                $nuevoNombre = $imagen->getRandomName();
                // Mover la imagen a la carpeta de uploads
                $imagen->move(WRITEPATH . 'uploads', $nuevoNombre);
                $data['imagen'] = $nuevoNombre;
    
                // Eliminar la imagen anterior si existía
                if (!empty($arbol['imagen'])) {
                    $rutaAnterior = WRITEPATH . 'uploads/' . $arbol['imagen'];
                    if (file_exists($rutaAnterior)) {
                        unlink($rutaAnterior);
                    }
                }
            }
    
            // Actualizar los datos en la base de datos
            if ($compraModel->update($id, $data)) {
                return redirect()->to('admin/adm_arbol_amigo')->with('success', 'Árbol actualizado correctamente.');
            } else {
                return redirect()->back()->with('error', 'Error al actualizar el árbol.');
            }
        }
    
        return view('admin/editar_arbol_amigo', ['arbol' => $arbol]);
    }
    

    // Método para eliminar un árbol
    public function eliminarArbol($id)
    {
        $compraModel = new VistaModel();
        if ($compraModel->delete($id)) {
            return redirect()->to('admin/adm_arbol_amigo')->with('success', 'Árbol eliminado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al eliminar el árbol.');
        }
    }
}