<?php
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $foto = $_FILES['foto'];
    $expediente = $_FILES['expediente'];

    $errores = [];

    if ($foto['type'] != 'image/png' || $foto['size'] > 2 * 1024 * 1024) {
        $errores[] = "La foto debe ser un archivo PNG y no superar los 2MB.";
    }

    if ($expediente['type'] != 'application/pdf' || $expediente['size'] > 10 * 1024 * 1024) {
        $errores[] = "El expediente debe ser un archivo PDF y no superar los 10MB.";
    }

    if (empty($errores)) {
        $rutaFoto = 'ruta/' . $foto['name'];
        $rutaExpediente = 'ruta/' . $expediente['name'];

        move_uploaded_file($foto['tmp_name'], $rutaFoto);
        move_uploaded_file($expediente['tmp_name'], $rutaExpediente);

        header("Location: exito.php?nombre=$nombre&foto=$rutaFoto&expediente=$rutaExpediente");
        exit();
    } else {
        foreach ($errores as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Expediente</title>
</head>
<body>
    <h1>Subir Expediente</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br><br>
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto">
        <br><br>
        <label for="expediente">Expediente:</label>
        <input type="file" id="expediente" name="expediente">
        <br><br>
        <input type="submit" name="submit" value="Subir">
    </form>
</body>
</html>

