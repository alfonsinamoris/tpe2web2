<?php

require_once './app/models/model.php';
require_once './app/views/api.view.php';
require_once './app/helpers/AuthApi.helper.php';

class ApiController {
    private $model;
    private $view;
    private $data;
    private $authHelper;

    public function __construct(){
        $this->model = new PropertyModel();
        $this->view = new ApiView();
        $this->authHelper = new AuthApiHelper();
        
        $this->data = file_get_contents("php://input");
    }

    private function getData(){
        return json_decode($this->data);
    }

    public function getProperties($params = null){
        if($_GET["sort"] == "ASC"){
            $properties = $this->model->orderPropertiesAscHab();//?sort=ASC
        }elseif($_GET["sort"] == "DESC"){
            $properties = $this->model->orderPropertiesDescHab();//?sort=DESC
        } else{
        $properties = $this->model->getAll();
        }
        return $this->view->response($properties, 200);
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
        //BARRERA DE SEGURIDAD
        if(!$this->authHelper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
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