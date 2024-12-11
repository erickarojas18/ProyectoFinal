<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\ArbolDisponibleModel;
use App\Models\EspecieModel;



class ArbolesDisponibles extends BaseController
{
    // Clase que gestiona operaciones relacionadas con árboles disponibles en la aplicación.

    public function index()
    {
        $arbolModel = new ArbolDisponibleModel();
        // Crea una instancia del modelo 

        $arboles = $arbolModel->cargarArbolesDisponibles();
        // Llama a un método para obtener los árboles disponibles desde la base de datos.

        $data = [
            'title' => 'Árboles Disponibles',
            'arboles' => $arboles
        ];
        // Prepara los datos que serán enviados a la vista, incluyendo el título y la lista de árboles.

        return view('admin/adm_arboles', $data);
        // Retorna la vista correspondiente con los datos preparados.
    }

    public function crear()
    {
        $especieModel = new EspecieModel();
        // Instancia el modelo para manejar los datos de las especies de árboles.

        $especies = $especieModel->obtenerOpcionesEspecies();
        // Obtiene las opciones de especies disponibles desde la base de datos.

        $data = [
            'title' => 'Registrar Nuevo Árbol',
            'especies' => $especies
        ];
        // Prepara los datos para enviarlos a la vista, como el título y las especies.

        return view('admin/crear_arbol', $data);
        // Retorna la vista para registrar un nuevo árbol con los datos preparados.
    }

    public function guardar()
    {
        $arbolModel = new ArbolDisponibleModel();
        // Instancia el modelo para guardar un nuevo árbol en la base de datos.

        $data = $this->request->getPost();
        // Obtiene los datos enviados desde el formulario.

        $file = $this->request->getFile('imagen');
        // Obtiene el archivo subido desde el formulario.

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Verifica que el archivo sea válido y no se haya movido previamente.

            $newName = $file->getRandomName();
            // Genera un nombre único para la imagen.

            $file->move(WRITEPATH . 'uploads/arboles', $newName);
            // Mueve el archivo a la carpeta de destino dentro del sistema.

            $data['imagen'] = $newName;
            // Agrega el nombre de la imagen a los datos que serán guardados.
        } else {
            // Si la imagen no es válida, redirige de vuelta con un mensaje de error.
            return redirect()->back()->withInput()->with('error', 'Error al subir la imagen.');
        }

        $data['estado'] = 1;
        // Establece el estado del árbol como activo (1) de forma predeterminada.

        if (!$arbolModel->insert($data)) {
            // Intenta insertar los datos en la base de datos y maneja errores si ocurren.
            return redirect()->back()->withInput()->with('errors', $arbolModel->errors());
        }

        return redirect()->to('/arbol')->with('success', 'Árbol registrado correctamente.');
        // Redirige con un mensaje de éxito si la inserción fue exitosa.
    }

    public function editar($id)
    {
        $arbolModel = new ArbolDisponibleModel();
        // Instancia el modelo para manejar datos de árboles.

        $arbol = $arbolModel->find($id);
        // Busca un árbol específico por su ID.

        if (!$arbol) {
            // Si no se encuentra el árbol, redirige con un mensaje de error.
            return redirect()->to('/arbol')->with('error', 'Árbol no encontrado.');
        }

        $data = [
            'title' => 'Editar Árbol',
            'arbol' => $arbol
        ];
        // Prepara los datos para enviarlos a la vista de edición.

        return view('admin/editar_arbol', $data);
        // Retorna la vista para editar el árbol seleccionado.
    }

    public function actualizar($id)
    {
        $arbolModel = new ArbolDisponibleModel();
        // Instancia el modelo para manejar datos de árboles.

        $data = $this->request->getPost();
        // Obtiene los datos enviados desde el formulario.

        if (!$arbolModel->update($id, $data)) {
            // Intenta actualizar el árbol en la base de datos y maneja errores si ocurren.
            return redirect()->back()->withInput()->with('errors', $arbolModel->errors());
        }

        return redirect()->to('/arbol')->with('success', 'Árbol actualizado correctamente.');
        // Redirige con un mensaje de éxito si la actualización fue exitosa.
    }

    public function eliminar($id)
    {
        $arbolModel = new ArbolDisponibleModel();
        // Instancia el modelo para manejar datos de árboles.

        $arbol = $arbolModel->find($id);
        // Busca el árbol por su ID para verificar si existe.

        if (!$arbol) {
            // Si el árbol no existe, redirige con un mensaje de error.
            return redirect()->to('/arbol')->with('error', 'Árbol no encontrado.');
        }

        if (!$arbolModel->delete($id)) {
            // Intenta eliminar el árbol y maneja errores si ocurren.
            return redirect()->to('/arbol')->with('error', 'No se pudo eliminar el árbol.');
        }

        return redirect()->to('/arbol')->with('success', 'Árbol eliminado correctamente.');
        // Redirige con un mensaje de éxito si la eliminación fue exitosa.
    }
}
