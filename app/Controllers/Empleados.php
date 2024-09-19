<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BaseController;
use App\Models\Areas;
use App\Models\Empleados_model;

class Empleados extends BaseController
{
    protected $helper = ['form'];
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $areasModel = new Areas();
        $data['areas']= $areasModel->findAll();
        $empleadosModel = new Empleados_model();
        $data['empleados']= $empleadosModel->findAll();

        foreach ($data['empleados'] as &$empleado) {
            $area = $areasModel->find($empleado['id_area']);
            $empleado['nombreArea'] = $area['nombreArea']; // Asumiendo que 'nombre' es el campo del nombre del área
        }
        return view('empleados/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        helper('form');
        $areasModel = new Areas();
        $data['areas'] = $areasModel->findAll();
        return view('empleados/agregar', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        helper('form');
        $reglas = [
            'password' => 'required|min_length[5]|max_length[10]|is_unique[empleados.password]',
            'correo' => 'required|valid_email|is_unique[empleados.correo]',
            'telefono' => 'required|is_unique[empleados.telefono]',
            'nombreempleado' => 'required',
            'apellidoempleado' => 'required',
            'fecha_nacimiento' => 'required',
            'id_area' => 'required|is_not_unique[areas.id]',
        ];
        

        if(!$this->validate($reglas)){
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['password', 'nombreempleado', 'apellidoempleado', 'fecha_nacimiento', 'correo', 'telefono', 'id_area']);

        $empleadosModel = new Empleados_model();
        $empleadosModel->insert((object)[
            'password' => trim($post['password']),
            'nombreempleado' => trim($post['nombreempleado']),
            'apellidoempleado' => trim($post['apellidoempleado']),
            'fecha_nacimiento' => trim($post['fecha_nacimiento']),
            'correo' => trim($post['correo']),
            'telefono' => trim($post['telefono']),
            'id_area' => trim($post['id_area'])
        ]);


        return redirect()->to('empleados');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        helper('form');
        if($id == null){
            return redirect()->route('empleados');
        }
        $areasModel = new Areas();
        $empleadosModel = new Empleados_model();

        $data['areas']= $areasModel->findAll();
        $data['empleado']= $empleadosModel->find($id);

        return view('empleados/editar', $data );
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {

        if(!$this->request->is('put') || $id == null){
            return redirect()->route('empleados');
        }

        $reglas = [
            'password' => "required|min_length[5]|max_length[10]|is_unique[empleados.password,id,{$id}]",
            'correo' => 'required|valid_email',
            'telefono' => 'required',
            'nombreempleado' => 'required',
            'apellidoempleado' => 'required',
            'fecha_nacimiento' => 'required',
            'id_area' => 'required|is_not_unique[areas.id]',
        ];
        

        if(!$this->validate($reglas)){
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['password', 'nombreempleado', 'apellidoempleado', 'fecha_nacimiento', 'correo', 'telefono', 'id_area']);

        $empleadosModel = new Empleados_model();
        $empleadosModel->update($id, [
            'password' => trim($post['password']),
            'nombreempleado' => trim($post['nombreempleado']),
            'apellidoempleado' => trim($post['apellidoempleado']),
            'fecha_nacimiento' => trim($post['fecha_nacimiento']),
            'correo' => trim($post['correo']),
            'telefono' => trim($post['telefono']),
            'id_area' => trim($post['id_area'])
        ]);


        return redirect()->to(base_url('empleados'))->with('success', 'Empleado actualizado correctamente');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
           if(!$this->request->is('delete') || $id == null) {
            return redirect()->route('empleados');
        }

        $empleadosModel = new Empleados_model();
        $empleadosModel->delete($id);

        return redirect()->to('empleados');
    }
}