<?php



    if(isset($_POST['guardar'])){
        require_once("configCate.php");

        $config = new ConfigCate();


        $config -> setNombres($_POST['nombres']);
        $config -> setDescripcion($_POST['descripcion']);
        $config -> setImagen($_POST['imagen']);

        $config -> insertData();

        echo "<script> alert('los datos fueron guardados sastifactoriamente');document.location = 'categorias.php'</script>";

    }


?>