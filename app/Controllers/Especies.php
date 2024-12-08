<?php

namespace App\Controllers;

use App\Models\EspecieModel;

class Especies extends BaseController
{
    protected $especieModel;

    public function __construct()
    {
        $this->especieModel = new EspecieModel(); // Instancia del modelo
    }

    public function index()
    {
        $especies = $this->especieModel->findAll();

        $data = [
            'title' => 'Lista de Especies',
            'especies' => $especies,
            'msg' => $this->request->getGet('msg')
        ];

        return view('admin/adm_especie', $data);
    }

    public function create()
    {
        $model = new EspecieModel();

        // Obtener opciones de nombre comercial y científico
        $opciones = $model->obtenerOpcionesEspecies();

        // Preparar las opciones para los selects
        $nombresComerciales = array_column($opciones, 'nombre_comercial');
        $nombresCientificos = array_column($opciones, 'nombre_cientifico');

        $title = 'Registrar Especie';


        // Cargar vista y pasar los datos
        return view('admin/crear_especie', [
            'title' => $title,
            'nombresComerciales' => $nombresComerciales,
            'nombresCientificos' => $nombresCientificos
        ]);
    }

    public function store()
    {
        // Obtener los datos del formulario de creación
        $input = $this->request->getPost();

        // Validar los datos
        if (!$this->validate([
            'nombre_comercial' => 'required|min_length[3]',
            'nombre_cientifico' => 'required|min_length[3]'
        ])) {
            return redirect()->to('/especies/create')->withInput()->with('msg', 'Datos inválidos.');
        }

        // Preparar los datos para guardar
        $newData = [
            'nombre_comercial' => $input['nombre_comercial'],
            'nombre_cientifico' => $input['nombre_cientifico']
        ];

        // Insertar los datos en la base de datos
        if ($this->especieModel->insert($newData)) {
            return redirect()->to('/especies')->with('msg', 'Especie agregada correctamente.');
        } else {
            return redirect()->to('/especies/create')->with('msg', 'Error al agregar la especie.');
        }
    }

    public function edit($id)
    {
        // Cargar la especie para editar
        $data['especie'] = $this->especieModel->find($id);

        if (!$data['especie']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Especie con ID $id no encontrada.");
        }

        return view('admin/editar_especie', $data);
    }

    public function update($id)
    {
        // Obtener datos del formulario de edición
        $input = $this->request->getPost();

        // Validación de datos
        if (!$this->validate([
            'nombre_comercial' => 'required|min_length[3]',
            'nombre_cientifico' => 'required|min_length[3]'
        ])) {
            return redirect()->to("/especies/edit/$id")->withInput()->with('msg', 'Datos inválidos.');
        }

        // Preparar los datos para actualizar
        $updatedData = [
            'id' => $id,
            'nombre_comercial' => $input['nombre_comercial'],
            'nombre_cientifico' => $input['nombre_cientifico']
        ];

        // Actualizar la especie en la base de datos
        if ($this->especieModel->save($updatedData)) {
            return redirect()->to('/especies')->with('msg', 'Especie actualizada correctamente.');
        } else {
            return redirect()->to("/especies/edit/$id")->with('msg', 'Error al actualizar la especie.');
        }
    }

    public function delete($id)
    {
        $this->especieModel->delete($id);
        return redirect()->to('/especies')->with('msg', 'Especie eliminada correctamente.');
    }
}
