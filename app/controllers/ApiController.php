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
        $this->data = file_get_contents("php://input");
    }

    private function getData(){
        return json_decode($this->data);
    }

    public function getProperties(){
            if(isset($_GET['order'])&& isset($_GET['sortby'])){
                //FITRA ASC Y DESC POR HABITACIONES
                if($_GET['sortby']=="habitaciones"){ 
                    if($_GET['order']=="ASC"){
                        $properties = $this->model->orderPropertiesAscHab();//?sortby=habitaciones&order=ASC
                    }elseif ($_GET["order"] == "DESC") {
                        $properties = $this->model->orderPropertiesDescHab();//?sortby=habitaciones&order=DESC
                    }
                }
                //FILTRA ASC Y DESC POR ID
                elseif($_GET["sortby"] == "id"){
                    if($_GET['order']=="ASC")
                        $properties = $this->model->orderPropertiesAscID();//?sortby=id&order=ASC
                    elseif ($_GET["order"] == "DESC") {
                        $properties = $this->model->orderPropertiesDescID();//?sortby=id&order=DESC
                    }
                }
                //FILTRA ASC Y DESC POR DIRECCION
                elseif($_GET["sortby"] == "direccion"){
                    if($_GET['order']=="ASC")
                        $properties = $this->model->orderPropertiesAscDirec();//?sortby=direccion&order=ASC
                    elseif ($_GET["order"] == "DESC") {
                        $properties = $this->model->orderPropertiesDescDirec();//?sortby=direccion&order=DESC
                    }
                }
                //FILTRA ASC Y DESC POR TIPO
                elseif($_GET["sortby"] == "tipo"){
                    if($_GET['order']=="ASC")
                        $properties = $this->model->orderPropertiesAscTipo();//?sortby=tipo&order=ASC
                    elseif ($_GET["order"] == "DESC") {
                        $properties = $this->model->orderPropertiesDescTipo();//?sortby=tipo&order=DESC
                    }
                }
                //FILTRA ASC Y DESC POR PRECIO
                elseif($_GET["sortby"] == "precio"){
                    if($_GET['order']=="ASC")
                        $properties = $this->model->orderPropertiesAscPrecio();//?sortby=precio&order=ASC
                    elseif ($_GET["order"] == "DESC") {
                        $properties = $this->model->orderPropertiesDescPrecio();//?sortby=precio&order=DESC
                    }
                }
            }    
            elseif(isset($_GET['filterByType'])){
                $properties = $this->model->ShowByType($_GET['filterByType']);//?filterByType=tipo
            }
            else{
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