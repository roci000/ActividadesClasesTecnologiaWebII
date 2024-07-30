<?php
    if (isset($_POST['submit'])) {
        $error =[];
        $nombre = isset($_POST['nombre'])? $_POST['nombre']:"";;
        $apellido = isset($_POST['apellido'])? $_POST['apellido']:"";
        $correo = isset($_POST['correo'])? $_POST['correo']:"";
        $comentario = isset($_POST['comentario'])? $_POST['comentario']:"";
        $idioma = isset($_POST['idioma']) ? $_POST['idioma'] : "";
        $musica = isset($_POST['musica']) ? $_POST['musica'] : "";
        $pasatiempo = isset($_POST['pasatiempo']) ? $_POST['pasatiempo'] : ""; //[]

        $datos = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "correo" => $correo,
            "comentario" => $comentario,
            "idioma" => $idioma,
            "musica" => $musica,
            "pasatiempo" => $pasatiempo
        ];

        $cont = 0;
        foreach ($datos as $dato => $value) {
            if (empty($value)) {
                $error[]= "<font color='#FF0000'>El campo $dato es requerido. </font><br>";
                $cont++;
            }
        }

        if (strlen($comentario) <= 0) {
            $error[]="";

        }
        elseif (strlen($comentario) <= 5 || strlen($comentario) >= 50) {
            $error[]="<font color='#FF0000'>El comentario tiene que ser mayor a 5 y menor a 50 letras.</font>"."<br>";

        }

        if (preg_match('/[*.\/@]/', $comentario)) {
            $error[]="<font color='#FF0000'>El comentario no debe contener los siguientes símbolos: * . / @ </font>"."<br>";
        }

        if (strlen($nombre) <= 0) {
            $error[]="";
        
        }
        elseif (strlen($nombre) <= 3 || strlen($nombre) >= 20) {
            $error[]="<font color='#FF0000'>El nombre tiene que tener mínimo 3 letras y máximo 20 letras. </font>"."<br>";  
        }

        if (strlen($apellido) <= 0) {
            $error[]="";
        }
        elseif (strlen($apellido) <= 3 || strlen($apellido) >= 20) {
            $error[]="<font color='#FF0000'>El apellido tiene que tener mínimo 3 letras y máximo 20 letras. </font>"."<br>";
        }

        if ($cont > 0) {
            $error[]= " ";
        } else {
            echo "Nombre: " . $nombre . "<br>";
            echo "Apellido: " .$apellido . "<br>";
            echo "Correo: " . $correo . "<br>";
            echo "Comentario: " . $comentario . "<br>";
            echo "Idioma: " .  $idioma . "<br>";
            echo "Música: " .$musica . "<br>";
            echo "Pasatiempos: ".$pasatiempo."<br>";
            /*foreach ($pasatiempo as $p) {
                echo $p . "<br>";
            }*/
        }

    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .error{
            font color='#FF0000';
        }
        .input-error {
            border: 1px solid red;
        }
        .textarea-error {
            border: 1px solid red;
        }
        .select-error{
            border: 1px solid red;
        }
        .radio-error {
            outline: 2px solid red;
            background-color: #ffe6e6;
        }
        .checkbox-error {
            outline: 2px solid red;
            background-color: #ffe6e6;
        }
    </style>
</head>
<body>
    <h1>Formulario de Contacto</h1>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="<?php echo isset($error[0]) ? 'input-error' : ''; ?>">
        <?php 
        if (isset($error[0])) {
            echo '<p class="error">'.$error[0].'</p>';
        }
        ?>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" class="<?php echo isset($error[1]) ? 'input-error' : ''; ?>">
        <?php 
        if (isset($error[1])) {
            echo "<p>".$error[1]."</p>";
        }
        ?>
        <br>
        <label for="correo">Correo electrónico:</label>
        <br>
        <input type="email" id="correo" name="correo" class="<?php echo isset($error[2]) ? 'input-error' : ''; ?>">
        <?php 
        if (isset($error[2])) {
            echo "<p>".$error[2]."</p>";
        }
        ?>
        <br>
        <label for="comentario">Comentario:</label>
        <br>
        <textarea id="comentario" name="comentario" rows="4" class="<?php echo isset($error[3]) ? 'textarea-error' : ''; ?>"></textarea>
        <?php 
        if (isset($error[3])) {
            echo "<p>".$error[3]."</p>";
        }
        ?>
        <br>
        <label for="idioma">Idioma preferido:</label>
        <br><!--
        <select id="idioma" name="idioma"  class="<?php //echo isset($error[4]) ? 'select-error' : ''; ?>">
            <option value=""> </option>
            <option value="Español">Español</option>
            <option value="Inglés">Inglés</option>
            <option value="Portugues">Portugues</option>
            <option value="Aleman">Aleman</option>
            <option value="Italiano">Italiano</option>
        </select>-->
        <?php
                //actividad
                $opciones = ["Español", "Ingles", "Frances", "Aleman", "Italiano"];
                function Opciones($opciones) {
                    $html = '';
                    foreach ($opciones as $opcion) {
                        $html .= "<option value='$opcion'>$opcion</option>";
                    }
                    return $html;
                }
        ?>
        <select id="idioma" name="idioma" class="<?php echo isset($error[4]) ? 'select-error' : ''; ?>">
            <option value="">Selecciona un idioma</option>
            <?php echo Opciones($opciones); ?>
        </select>
        <?php 
        if (isset($error[4])) {
            echo "<p>".$error[4]."</p>";
        }
        ?>
        <br>
        <?php
// Array de opciones para los radios
$radios = ["Rock", "Pop", "Reggueton", "Cumbia", "Folklore"];

// Función para generar los inputs de tipo radio y sus etiquetas
function generarRadios($radios) {
    $html = '';
    foreach ($radios as $radio) {
        $html .= "<input type='radio' id='$radio' name='musica' value='$radio' class='";
        $html .= "<label for='$radio'>$radio</label><br>";
    }
    return $html;
}
?>
        <label>Música favorita:</label>
        <br> <!--
        <input type="radio" id="rock" name="musica" value="rock" class="<//?php echo isset($error[5]) ? 'radio-error' : ''; ?>">
        <label for="rock">Rock</label>
        <input type="radio" id="pop" name="musica" value="pop" class="<?//php echo isset($error[5]) ? 'radio-error' : ''; ?>">
        <label for="pop">Pop</label>
        <input type="radio" id="pop" name="musica" value="reggueton" class="<?//php echo isset($error[5]) ? 'radio-error' : ''; ?>">
        <label for="pop">Reggueton</label>
        <input type="radio" id="pop" name="musica" value="cumbia" class="<?//php echo isset($error[5]) ? 'radio-error' : ''; ?>">
        <label for="pop">Cumbia</label>
        <input type="radio" id="pop" name="musica" value="folklore" class="<?//php echo isset($error[5]) ? 'radio-error' : ''; ?>">
        <label for="pop">Folklore</label>
        <br>-->
        <?php 
        // Generar los radios dinámicamente
        echo generarRadios($radios); 
        ?>
        <?php 
        if (isset($error[5])) {
            echo "<p>".$error[5]."</p>";
        }
        ?>
        <label>Pasatiempos:</label>
        <br>
        <?php
// Array de opciones para los radios
$chesks = ["Lectura", "Deporte", "Baile", "Natacion"];

// Función para generar los inputs de tipo radio y sus etiquetas
function generarcheck($chesks) {
    $html = '';
    foreach ($chesks as $check) {
        $html .= "<input type='checkbox' id='$check' name='pasatiempo' value='$check' class='";
        $html .= "<label for='$check'>$check</label><br>";
    }
    return $html;
}
?>
        <!--
        <input type="checkbox" id="lectura" name="pasatiempo[]" value="lectura" class="<?php //echo isset($error[6]) ? 'checkbox-error' : ''; ?>">
        <label for="lectura">Lectura</label>
        <input type="checkbox" id="deporte" name="pasatiempo[]" value="deporte" class="<?//php// echo isset($error[6]) ? 'checkbox-error' : ''; ?>">
        <label for="deporte">Deporte</label>
        <input type="checkbox" id="deporte" name="pasatiempo[]" value="baile" class="<?php //echo isset($error[6]) ? 'checkbox-error' : ''; ?>">
        <label for="deporte">Baile</label>
        <input type="checkbox" id="deporte" name="pasatiempo[]" value="natacion" class="<//?php// echo isset($error[6]) ? 'checkbox-error' : ''; ?>">
        <label for="deporte">Natacion</label>
        <br>-->
        <?php 
        // Generar los radios dinámicamente
        echo generarcheck($chesks); 
        ?>
        <?php 
        if (isset($error[6])) {
            echo "<p>".$error[6]."</p>";
        }
        ?>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>
