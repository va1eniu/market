<?php



    if(isset($_POST['guardar'])){
        require_once("configProveedores.php");

        $config = new ConfigProveedores();


        $config -> setnombre($_POST['nombre']);
        $config -> settelefono($_POST['telefono']);
        $config -> setciudad($_POST['ciudad']);

        $config -> insertData();

        echo "<script> alert('los datos fueron guardados sastifactoriamente');document.location = 'proveedores.php'</script>";

    }


?>