<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


if(isset($_POST["guardar"])){
    require_once("configEmpleados.php");
   

    $config = new Empleados();

    $config->setnombre($_POST["nombre"]);
    $config->setCelular($_POST["celular"]);
    $config->setDireccion($_POST["direccion"]);
    $config->setImagen($_POST["imagen"]);
  
  $config->insertData();

    echo "
    <script> alert('Los datos fueron guardados exitosamente');
    document.location='empleados.php'
    </script>"; 
}
?>