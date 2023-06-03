<?php
require_once("configEmpleados.php");
$data = new Empleados();
$id = $_GET["id"];
$data->setid($id);

$record = $data->selectOne();
$val = $record[0];

if (isset($_POST["editar"])) {

  $data->setnombre($_POST["nombre"]);

  $data->setCelular($_POST["celular"]);
  $data->setDireccion($_POST["direccion"]);
  $data->setImagen($_POST["imagen"]);

  $data->update();
   echo "
    <script> alert('Los Datos fueron Actualizados exitosamente');
    document.location='Empleados.php'
    </script>"; 
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Categorias</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camp Skiler.</h3>
        <img src="" alt="" class="imagenPerfil">
        <h3 >valentina perez</h3>
      </div>
      <div class="menus">
        <a href="..//Categorias.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3>Categorias</h3>
        </a>
        <a href="..//Clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3>Clientes</h3>
        </a>
        <a href="..//Empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3>Empleados</h3>
        </a>
        <a href="..//Facturas.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3>Facturas</h3>
        </a>
        <a href="..//Proveedores.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3>Proveedores</h3>
        </a>
        <a href="..//Productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3>Productos</h3>
        </a>
        <a href="..//FacturaDetalle.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3>Factura Detalle</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Empleados a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                  type="text"
                  id="nombre"
                  name="nombre"
                  class="form-control"  
                  value="<?= $val["nombre"]?>"
                />
              </div>

<!--               <div class="mb-1 col-12">
                <label for="rol" class="form-label">Empleado Rol</label>
                <select class="form-select" aria-label="Default select example" id="rol" name="rol" required>
                  <option selected><= $val["rol"]?></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Jefe">Jefe</option>
                  <option value="Trabajador">Trabajador</option>
                </select>
              </div> -->

              <div class="mb-1 col-12">
                <label for="celular" class="form-label">Celular</label>
                <input 
                  type="text"
                  id="celular"
                  name="celular"
                  class="form-control"  
                  value="<?= $val["celular"]?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Direccion</label>
                <input 
                  type="text"
                  id="direccion"
                  name="direccion"
                  class="form-control"  
                  value="<?= $val["direccion"]?>"
                 
                />
              </div>

               <div class="mb-1 col-12">
                <label for="imagen" class="form-label">Imagen</label>
                <input 
                  type="text"
                  id="imagen"
                  name="imagen"
                  class="form-control"  
                  value="<?= $val["imagen"]?>"
                 
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Empleados</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>