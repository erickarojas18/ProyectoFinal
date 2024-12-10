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
        return view('admin/ver_arboles', ['arboles' => $arbolesComprados]);
    }


    public function editarArbolAmigo($id)
    {
        // Modelos necesarios
        $arbolDisponibleModel = new ArbolDisponibleModel();
        $vistaModel = new VistaModel();
    
        // Buscar los datos del árbol en la tabla de 'arboles_dispo' y 'compras'
        $arbol = $vistaModel
            ->select('compras.id as compra_id, compras.user_id, 
                      arboles_dispo.id as arbol_id, arboles_dispo.tamano, arboles_dispo.especie, 
                      arboles_dispo.ubicacion, arboles_dispo.precio, arboles_dispo.estado, arboles_dispo.imagen')
            ->join('arboles_dispo', 'compras.arbol_id = arboles_dispo.id')
            ->where('compras.id', $id)
            ->first();
    
        if (!$arbol) {
            return redirect()->to('admin/adm_arbol_amigo')->with('error', 'Árbol no encontrado.');
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Datos del formulario
            $dataArbol = [
                'tamano' => $this->request->getPost('tamano'),
                'especie' => $this->request->getPost('especie'),
                'ubicacion' => $this->request->getPost('ubicacion'),
                'precio' => $this->request->getPost('precio'),
                'estado' => $this->request->getPost('estado')
            ];
    
            // Manejo de la imagen
            $imagen = $this->request->getFile('imagen');
            if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move(WRITEPATH . 'uploads', $nuevoNombre);
                $dataArbol['imagen'] = $nuevoNombre;
    
                // Eliminar la imagen anterior si existía
                if (!empty($arbol['imagen'])) {
                    $rutaAnterior = WRITEPATH . 'uploads/' . $arbol['imagen'];
                    if (file_exists($rutaAnterior)) {
                        unlink($rutaAnterior);
                    }
                }
            }
    
            // Actualizar en la base de datos
            $arbolActualizado = $arbolDisponibleModel->update($arbol['arbol_id'], $dataArbol);
    
            if ($arbolActualizado) {
                return redirect()->to('admin/adm_arbol_amigo')->with('success', 'Árbol actualizado correctamente.');
            } else {
                return redirect()->back()->with('error', 'Error al actualizar los datos.');
            }
        }
    
        // Pasar los datos a la vista
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
