<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
    <link rel="stylesheet" href="resources/maquetador.css">

    <?php
    include("credenciales/Credenciales.php");
    //include("model/Conexion.php");
    include("controller/DatosPersonalesController.php");
    include("entitis/DatosPersonalesEntitis.php");
    ?>
</head>
<body>
    
<h1>Datos Personales</h1>


<table>
<?php

    $conexion = new Conexion($host,$usuario,$password,$bd);
    $conexion->getConexion();
    $datosPersonalesEntitis = new DatosPersonalesEntities();
    $datosPersonalesController = new DatosPersonalesController();

    $datos = $datosPersonalesController->getDatosPersonales($conexion);

    
    echo "<tr><th>NIF</th>  <th>Nombre</th> <th>Apellido</th> <th>Edad</th></tr>";
    
    while (($fila = $datos->fetch_row())==true) { //verifica si hay filas
        echo "<tr>" . 
         "<td>" . $fila[0] . "</td>" .
         "<td>" . $fila[1] . "</td> " .
         "<td>" . $fila[2] . "</td> " .
         "<td>" . $fila[3] . "</td> " .
         "</tr>" .
         "";
    }
    


?>
</table>

<form action="index.php" method="post">
    <h2>Registra Usuario</h2>
    <input type="text" placeholder="Inserta id" name="id" id="id"><br>
    <input type="text" placeholder="Inserta nombre" name="nombre" id="nombre"><br>
    <input type="text" placeholder="Inserta apellido" name="apellido" id="apellido"><br>
    <input type="text" placeholder="Inserta edad" name="edad" id="edad"><br><br>
    <input type="submit" name="registrar" id="registrar" value="Registrar">
</form>

<?php


 //Insertando registro
if(isset($_POST["registrar"])) {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];

    $datosPersonalesEntitis->setNif($id);
    $datosPersonalesEntitis->setNombre($nombre);
    $datosPersonalesEntitis->setApellido($apellido);
    $datosPersonalesEntitis->setEdad($edad);


    $datosPersonalesController->setDatosPersonales(
        $datosPersonalesEntitis->getNif(),
        $datosPersonalesEntitis->getNombre(),
        $datosPersonalesEntitis->getApellido(),
        $datosPersonalesEntitis->getEdad(),
        $conexion
    );
}



?>


</body>
</html>