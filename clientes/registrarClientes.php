<?php



    if(isset($_POST['guardar'])){
        require_once("configClientes.php");

        $config = new ConfigClientes();


        $config -> setcelular($_POST['celular']);
        $config -> setcompañia($_POST['compañia']);
        print_r($config);
        $config -> insertData();

        echo "<script> alert('los datos fueron guardados sastifactoriamente');document.location = 'clientes.php'</script>"; 

    }


?>