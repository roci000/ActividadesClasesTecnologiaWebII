<?php
if (isset($_POST['submit'])) {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
    $carrera = isset($_POST['carrera']) ? $_POST['carrera'] : "";

    $error = array();

    if (strlen($nombre) <= 0) {
        $error[0] = "El nombre es obligatorio.";
    }
    if (strlen($apellido) <= 0) {
        $error[1] = "El apellido es obligatorio.";
    }
    if (strlen($carrera) <= 0) {
        $error[2] = "La carrera es obligatoria.";
    }

    if (empty($error)) {
        $archivo = "Actividad10.txt";
        if (touch($archivo)) {
            $datos = fopen($archivo, "w");
            fwrite($datos, "Nombre: $nombre\n");
            fwrite($datos, "Apellido: $apellido\n");
            fwrite($datos, "Carrera: $carrera\n");
            fclose($datos);
            $datos = fopen($archivo, "r");
            while (!feof($datos)) {
                $linea = fgets($datos, 1024);
                echo $linea."<br>";
            }
            fclose($datos);
        } else {
            $mensaje_error = "Hubo un error al crear el archivo.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido"><br><br>

        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera"><br><br>

        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>
