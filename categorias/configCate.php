<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("../conec/conec.php");

    class ConfigCate extends Conec{
        private $id;
        private $nombres;
        private $descripcion;
        private $imagen;
        protected $dbCnx;

        public function __construct($id = 0, $nombres = "", $descripcion = "", $imagen = "" , $dbCnx=""){

            $this -> id = $id;
            $this -> nombres = $nombres;
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

        public function setNombres($nombres){
            $this -> nombres = $nombres;
        }

        public function getNombres(){
            return $this -> nombres;
        }

        public function setDescripcion($descripcion){
            $this -> descripcion = $descripcion;
        }

        public function getDescripcion(){
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
                $stm = $this -> dbCnx -> prepare("INSERT INTO categorias (nombres, descripcion, imagen) values(?,?,?)");
            $stm -> execute([$this->nombres, $this->descripcion, $this->imagen]);
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
            
        }

        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM categorias WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm-> fetchAll();
/*                 echo "<script> alert('los datos fueron eliminados sastifactoriamente');document.location = 'categorias.php'</script>";
 */
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
                $stm = $this -> dbCnx-> prepare("UPDATE categorias SET NOMBRES = ?, DESCRIPCION = ?, IMAGEN = ? WHERE id= ?");
                $stm -> execute([$this -> nombres , $this -> descripcion, $this -> imagen, $this -> id]);
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

}

?>