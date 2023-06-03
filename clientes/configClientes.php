<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("../conec/conec.php");

    class ConfigClientes extends Conec{
        private $id;
        private $celular;
        private $compañia;
      
        protected $dbCnx;

        public function __construct($id = 0, $celular = "", $compañia = "", $dbCnx=""){

            $this -> id = $id;
            $this -> celular = $celular;
            $this -> compañia = $compañia;
           
            parent::__construct($dbCnx);
        }
        public function setId($id){
            $this -> id = $id;
        }

        public function getId(){
            return $this -> id;
        }

        public function setcelular($celular){
            $this -> celular = $celular;
        }

        public function getcelular(){
            return $this -> celular;
        }

        public function setcompañia($compañia){
            $this -> compañia = $compañia;
        }

        public function getcompañia(){
            return $this -> compañia;
        }

      

        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO clientes (celular, compañia) values(?,?)");
            $stm -> execute([$this->celular, $this->compañia]);
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
            
        }

        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM clientes WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm-> fetchAll();
/*                 echo "<script> alert('los datos fueron eliminados sastifactoriamente');document.location = 'clientes.php'</script>";
 */
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }



        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM clientes WHERE id= ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
        }

        public function update(){
            try {
                $stm = $this -> dbCnx-> prepare("UPDATE clientes SET celular = ?, compañia = ?, WHERE id= ?");
                $stm -> execute([$this -> celular , $this -> compañia, $this -> id]);
            } catch (Exception $e) {
                return $e -> getMessage(); 
            }
        } 



        public function obtainAll(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM clientes");
                $stm-> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {    
                return $e->getMessage(); 
            }
        }

}

?>