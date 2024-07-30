<?php
$fecha1=strtotime('2024-06-21');
$fecha2=strtotime('2024-09-21');
$fecha=strtotime($_GET['f']);
echo $_GET['f'];
echo "<br>";

if ($fecha>=$fecha1 && $fecha<=$fecha2) {
    echo "Es verano". "<br>";
}
else{
    echo "No es verano". "<br>";
}

?>