<?php

namespace App\Controllers;

use App\Models\EstadisticasModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $estadisticasModel = new EstadisticasModel();

        // Obtener estadísticas
        $cantidad_amigos = $estadisticasModel->contarAmigosRegistrados();
        $cantidad_arboles_disponibles = $estadisticasModel->contarArbolesDisponibles();
        $cantidad_arboles_vendidos = $estadisticasModel->contarArbolesVendidos();

        // Pasar datos a la vista
        return view('admin/dashboard', [
            'cantidad_amigos' => $cantidad_amigos,
            'cantidad_arboles_disponibles' => $cantidad_arboles_disponibles,
            'cantidad_arboles_vendidos' => $cantidad_arboles_vendidos
        ]);
    }
}
