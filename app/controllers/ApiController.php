<?php

require_once './app/models/model.php';
require_once './app/views/api.view.php';

class ApiController {
    private $model;
    private $view;
    private $data;

    public function __construct(){
        $this->model = new PropertyModel();
        $this->view = new ApiView();
        //lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData(){
        return json_decode($this->data);
    }

    public function getProperties($params = null){
        $properties = $this->model->getAll();
        $this->view->response($properties);
    }

    public function getProperty($params = null){
        $id = $params[':ID'];
        $property = $this->model->get($id);
        if ($property){
            $this->view->response($property);
        }else {
            $this->view->response ("la propiedad con el id=$id no existe", 404);
    
        }
    }

    public function deleteProperty($params = null){
        $id = $params[':ID'];
        $property = $this->model->get($id);
        if ($property){
            $this->model->delete($id);
            $this->view->response($property);

        }else{ 
            $this->view->response ("la propiedad con el id=$id no existe", 404);
         }
    }

    public function insertProperty($params = null){
        $property = $this->getData();
        if (empty($property->direccion)||empty($property->tipo)||empty($property->habitaciones)||empty($property->precio)||empty($property->alquiler_venta)){
            $this->view->response("complete los datos", 400);
        }else{
            $id = $this->model->insert($property->direccion, $property->tipo, $property->habitaciones, $property->precio, $property->alquiler_venta);
            $property = $this->model->get($id);
            $this->view->response($property, 201);
        }
    }

    public function updateProperty($params = null){
        $id = $params[':ID'];
        $data = $this->getData();
        $property = $this->model->get($id);
        if ($property){
            $this->model->update($id,$data->direccion, $data->tipo, $data->habitaciones, $data->precio, $data->alquiler_venta);
            $this->view->response("la tarea fue modificada", 200);

        }else{ 
            $this->view->response ("la propiedad con el id=$id no existe", 404);
         }
    }
}