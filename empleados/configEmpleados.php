<?php

require_once("../conec/conec.php");

class Empleados extends Conec{
    
    private $id;
    private $nombre;
    /* private $rol; */
    private $celular;
    private $direccion;
    private $imagen;

    public function __construct($id= 0, $nombre= "",$celular=0, $direccion="",$imagen=""){
        $this->id = $id;
        $this->nombre = $nombre;
        /* $this->rol = $rol; */
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->imagen = $imagen;
        parent::__construct();
    }
    
    //Getters
    public function getid(){
        return $this->id;
    }

    public function getnombre(){
        return $this->nombre;
    }



    public function getCelular(){
        return $this->celular;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getImagen(){
        return $this->imagen;
    }

    //Setters
    public function setid($id){
        $this->id =$id;
    }

    public function setnombre($nombre){
        $this->nombre =$nombre;
    }



    public function setCelular($celular){
        $this->celular =$celular;
    }

    public function setDireccion($direccion){
        $this->direccion =$direccion;
    }

    public function setImagen($imagen){
        $this->imagen =$imagen;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO empleados(nombre, celular,direccion,imagen) VALUES (:nomb,:cel,:dire,:img)");
            $stm->bindParam(":nomb",$this->nombre);
            $stm->bindParam(":cel",$this->celular);
            $stm->bindParam(":dire",$this->direccion);
            $stm->bindParam(":img",$this->imagen);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM empleados WHERE id = :id");
            $stm->bindParam(":id",$this->id);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM empleados WHERE id = :id");
            $stm->bindParam(":id",$this->id);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE empleados SET nombre=:nomb , celular=:descr , direccion=:dire , imagen=:img
            WHERE id = :id");
            $stm->bindParam(":id",$this->id);
            $stm->bindParam(":nomb",$this->nombre);
            $stm->bindParam(":descr",$this->celular);
            $stm->bindParam(":dire",$this->direccion);
            $stm->bindParam(":img",$this->imagen);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>