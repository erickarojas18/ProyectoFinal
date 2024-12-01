<?php

namespace App\Controllers;

class Menu extends BaseController
{
    public function index()
    {
        // Carga la vista principal del formulario
        return view('menu');
    }
}
