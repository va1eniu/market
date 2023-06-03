<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("../conec/conec.php");

    class Config extends Conec{
        private $id;
        private $nombres;
        private $direccion;
        private $logros;
        protected $dbCnx;

        public function __construct($id = 0, $nombres = "", $direccion = "", $logros = "" , $dbCnx=""){

            $this -> id = $id;
            $this -> nombres = $nombres;
            $this -> direccion = $direccion;
            $this -> logros = $logros;
            parent::__construct($dbCnx);
        }
        public function setId($id){
            $this -> id = $id;
        }

        public function getId(){
            return $this -> id;
        }

        public function setNombres($nombres){
            $this -> nombres = $nombres;
        }

        public function getNombres(){
            return $this -> nombres;
        }

        public function setDireccion($direccion){
            $this -> direccion = $direccion;
        }

        public function getDireccion(){
            return $this -> direccion;
        }

        public function setLogros($logros){
            $this -> logros = $logros;
        }

        public function getLogros(){
            return $this -> logros;
        }

        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO campers (nombres, direccion, logros) values(?,?,?)");
            $stm -> execute([$this->nombres, $this->direccion, $this->logros]);
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
            
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM campers");
                $stm-> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {    
                return $e->getMessage(); 
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM campers WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM campers WHERE id= ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
        }


        public function update(){
            try {
                $stm = $this -> dbCnx-> prepare("UPDATE campers SET NOMBRES = ?, direccion = ?, logros = ? WHERE id= ?");
                $stm -> execute([$this -> nombres , $this -> direccion, $this -> logros, $this -> id]);
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
        } 
        



    }



    class ConfigCategorias extends Conec{
        private $id;
        private $nombre;
        private $descripcion;
        private $imagen;
        protected $dbCnx;

        public function __construct($id = 0, $nombre = "", $descripcion = "", $imagen = "" ,$dbCnx=""){

            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> descripcion = $descripcion;
            $this -> imagen = $imagen;
            parent::__construct($dbCnx);


        }

        public function setId($id){
            $this -> id = $id;
        }

        public function getId(){
            return $this -> id;
        }

        public function setNombres($nombre){
            $this -> nombre = $nombre;
        }

        public function getNombres(){
            return $this -> nombre;
        }

        public function setdescripcion($descripcion){
            $this -> descripcion = $descripcion;
        }

        public function getdescripcion(){
            return $this -> descripcion;
        }

        public function setImagen($imagen){
            $this -> imagen = $imagen;
        }

        public function getImagen(){
            return $this -> imagen;
        }

        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO categorias (nombre, descripcion, imagen) values(?,?,?)");
            $stm -> execute([$this->nombre, $this->descripcion, $this->imagen]);
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
            
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM categorias");
                $stm-> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {    
                return $e->getMessage(); 
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM categorias WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM categorias WHERE id= ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
        }


        public function update(){
            try {
                $stm = $this -> dbCnx-> prepare("UPDATE categorias SET nombres = ?, descripcion = ?, imagen = ? WHERE id= ?");
                $stm -> execute([$this -> nombre , $this -> descripcion, $this -> imagen, $this -> id]);
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
        } 
        



    }

?>