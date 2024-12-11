<?php

namespace App\Controllers;

// Define el espacio de nombres para la clase, lo que organiza el código y evita conflictos con otras clases de nombres similares.

use App\Models\ArbolDisponibleModel;
use App\Models\ComprasModel;

// Importa dos modelos para manejar datos relacionados con árboles disponibles y compras.

class Arbol extends BaseController
{
    // La clase extiende `BaseController`, que es una clase base común en frameworks como CodeIgniter.
    
    public function index()
    {
        $arbolModel = new ArbolDisponibleModel();
        // Crea una instancia del modelo que gestiona los árboles disponibles.

        $arboles = $arbolModel->cargarArbolesDisponibles();
        // Llama a un método del modelo para cargar los árboles disponibles desde la base de datos.

        return view('usuarios/arboles_disponibles', ['arboles' => $arboles]);
        // Retorna una vista con los datos de los árboles disponibles.
    }

    public function comprar($id)
    {
        $session = session();
        // Obtiene la sesión actual para verificar si el usuario está autenticado.

        $usuario = $session->get('usuario'); // Obtén el usuario desde la sesión
        $userId = is_array($usuario) ? $usuario['id'] : $usuario->id; // Maneja ambos casos
        // Verifica si el usuario está almacenado como un array o un objeto y extrae el ID.

        if (!$userId) {
            // Redirige al usuario al login si no está autenticado.
            return redirect()->to('/login')->with('msg', 'Debes iniciar sesión para comprar un árbol.');
        }

        $arbolModel = new \App\Models\ArbolDisponibleModel();
        // Crea una instancia del modelo para gestionar la compra de árboles.

        // Registrar la compra
        $compraData = [
            'user_id' => $userId,
            'arbol_id' => $id,
            'fecha_compra' => date('Y-m-d H:i:s'),
        ];
        // Prepara los datos de la compra para registrarlos en la base de datos.

        $arbolModel->registrarCompra($compraData);
        // Llama a un método del modelo para registrar la compra en la base de datos.

        // Actualizar el estado del árbol
        $arbolModel->update($id, ['estado' => 0]);
        // Cambia el estado del árbol a "0" (probablemente significa que ya no está disponible).

        // Redirige con un mensaje de éxito
        return redirect()->to('/arboles_disponibles')->with('msg', 'Árbol comprado exitosamente.');
        // Redirige al usuario con un mensaje confirmando la compra.
    }

    public function arbolesComprados()
    {
        $session = session();
        // Obtiene la sesión actual.

        $usuario = $session->get('usuario'); // Obtener datos del usuario desde la sesión
        $userId = is_array($usuario) ? $usuario['id'] : $usuario->id; // Soporte para array y objeto
        // Extrae el ID del usuario autenticado, manejando diferentes formatos de sesión.

        if (!$userId) {
            // Redirige al login si no hay un usuario autenticado.
            return redirect()->to('/login')->with('msg', 'Debes iniciar sesión para ver tus árboles comprados.');
        }

        $compraModel = new ComprasModel();
        // Instancia un modelo para manejar las compras de árboles.

        $arbolesComprados = $compraModel->cargarArbolesComprados($userId);
        // Obtiene los árboles comprados por el usuario actual.

        return view('usuarios/arboles_comprados', ['arboles' => $arbolesComprados]);
        // Retorna una vista con la lista de árboles comprados por el usuario.
    }
}
