<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class NarutoController extends ResourceController
{
    protected $modelName = "App\Models\NarutoModel";
    protected $format = 'json';

    public function index()
    {
        $naruto = $this->model->findAll();
        return $this->respond($naruto);
    }

    public function show($id = null)
    {
        $naruto = $this->model->find($id);
        return $this->respond($naruto);
    }

    public function create()
    {
        $data = [
            "nombre" => $_POST["nombre"],
            "clan" => $_POST["clan"],
            "aldea" => $_POST["aldea"],
            "rango" => $_POST["rango"],
            "descripcion" => $_POST["descripcion"],
            "imagen" => $_POST["imagen"]

        ];
        $respuesta = $this->model->save($data);
        return $this->respond($respuesta);
    }

    function update($id = null)
    {
        $data = $this->request->getPost();
        foreach ($data as $k => $v) {
            if ($v == "") {
                unset($data[$k]);
            }
        }
        $resultado = $this->model->update($id, $data);
        if ($resultado) {
            $resultado = ["NarutoAPI" => $this->model->find($id)];
        } else {
            $resultado = ["error" => $this->model->errors()];
        }
        return $this->respond($resultado);
    }

    function delete($id = null)
    {
        $naruto = $this->model->find($id);
        if ($naruto) {
            $this->model->delete($id);
            return $this->respond($naruto);
        } else {
            return $this->respond(["error" => "No existe el personaje"]);
        }
    }
}