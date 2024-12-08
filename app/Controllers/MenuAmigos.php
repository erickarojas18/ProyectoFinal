<?php

namespace App\Controllers;

class MenuAmigos extends BaseController
{
    public function index()
    {
        // Carga la vista principal del formulario
        return view('menu_amigo');
    }
}
