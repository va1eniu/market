<?php

    require_once("configClientes.php");
    $record = new ConfigClientes();

if(isset($_GET['id']) && isset($_GET['req'])){
    if($_GET['req'] == "delete"){
        $record -> setId($_GET['id']);
        $record -> delete();
        echo "<script> alert('Dato borrado sastifactoriamente');document.location='clientes.php' </script>";
        

    }
}


?>