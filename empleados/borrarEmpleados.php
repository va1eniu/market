<?php
require_once("configEmpleados.php");

$record = new Empleados();

if (isset($_GET["id"]) && isset($_GET["req"])) {
    if (isset($_GET["req"]) == "delete") {
        $record -> setid($_GET["id"]);
        $record -> delete();
        echo "
        <script> alert('Los datos fueron borrados Exitosamente');
        document.location='empleados.php'
        </script>";
    }
}
?>