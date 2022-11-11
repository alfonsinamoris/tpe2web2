<?php

class PropertyModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=inmobiliaria;charset=utf8', 'root', '');
    }

    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM propiedades");
        $query->execute();
        $properties = $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM propiedades WHERE id_propiedad=?");
        $query->execute([$id]);
        $property = $query->fetch(PDO::FETCH_OBJ);
        return $property;
    }

    public function delete($id){
        $query = $this->db->prepare("DELETE FROM propiedades WHERE id_propiedad=?");
        $query->execute([$id]);
    }

    public function insert($direccion, $tipo, $habitaciones, $precio, $alquiler_venta){
        $query = $this->db->prepare("INSERT INTO propiedades (direccion, tipo, habitaciones, precio, alquiler_venta) VALUES (?,?,?,?,?)");
        $query->execute([$direccion, $tipo, $habitaciones, $precio, $alquiler_venta]);
        return $this->db->lastInsertId();
    }

    public function update($id,$direccion, $tipo, $habitaciones, $precio, $alquiler_venta){
        $query = $this->db->prepare("UPDATE propiedades SET direccion=?,tipo=?,habitaciones=?,precio=?,alquiler_venta=? WHERE id_propiedad = ?");
        $query->execute([$direccion, $tipo, $habitaciones,$precio,$alquiler_venta,$id]);
    }

    public function orderPropertiesAscHab(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY habitaciones ASC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function orderPropertiesDescHab(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY habitaciones DESC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function orderPropertiesAscID(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY id_propiedad ASC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function orderPropertiesDescID(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY id_propiedad DESC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function orderPropertiesAscDirec(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY direccion ASC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function orderPropertiesDescDirec(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY direccion DESC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function orderPropertiesAscTipo(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY tipo ASC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function orderPropertiesDescTipo(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY tipo DESC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function orderPropertiesAscPrecio(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY precio ASC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function orderPropertiesDescPrecio(){
        $query = $this->db->prepare("SELECT * FROM propiedades ORDER BY precio ASC");
        $query->execute();
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

    public function ShowByType($tipo){
        $query = $this->db->prepare("SELECT * FROM propiedades WHERE tipo = ?");
        $query->execute([$tipo]);
        $properties= $query->fetchAll(PDO::FETCH_OBJ);
        return $properties;
    }

}
