<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("../conec/conec.php");

    class ConfigProveedores extends Conec{
        private $id;
        private $nombre;
        private $telefono;
        private $ciudad;
        protected $dbCnx;

        public function __construct($id = 0, $nombre = "", $telefono = "", $ciudad = "" , $dbCnx=""){

            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> telefono = $telefono;
            $this -> ciudad = $ciudad;
            parent::__construct($dbCnx);
        }
        public function setId($id){
            $this -> id = $id;
        }

        public function getId(){
            return $this -> id;
        }

        public function setnombre($nombre){
            $this -> nombre = $nombre;
        }

        public function getnombre(){
            return $this -> nombre;
        }

        public function settelefono($telefono){
            $this -> telefono = $telefono;
        }

        public function gettelefono(){
            return $this -> telefono;
        }

        public function setciudad($ciudad){
            $this -> ciudad = $ciudad;
        }

        public function getciudad(){
            return $this -> ciudad;
        }

        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO proveedores (nombre, telefono, ciudad) values(?,?,?)");
            $stm -> execute([$this->nombre, $this->telefono, $this->ciudad]);
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
            
        }

        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM proveedores WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm-> fetchAll();
/*                 echo "<script> alert('los datos fueron eliminados sastifactoriamente');document.location = 'proveedores.php'</script>";
 */
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }



        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM proveedores WHERE id= ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
        }

        public function update(){
            try {
                $stm = $this -> dbCnx-> prepare("UPDATE proveedores SET nombre = ?, telefono = ?, ciudad = ? WHERE id= ?");
                $stm -> execute([$this -> nombre , $this -> telefono, $this -> ciudad, $this -> id]);
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
        } 



        public function obtainAll(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM proveedores");
                $stm-> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {    
                return $e->getMessage(); 
            }
        }

}

?>