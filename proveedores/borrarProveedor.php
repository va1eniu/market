<?php

    require_once("configCate.php");
    $record = new ConfigCate();

if(isset($_GET['id']) && isset($_GET['req'])){
    if($_GET['req'] == "delete"){
        $record -> setId($_GET['id']);
        $record -> delete();
        echo "<script> alert('Dato borrado sastifactoriamente');document.location='categorias.php' </script>";
        

    }
}


?>