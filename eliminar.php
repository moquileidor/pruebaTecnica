<?php
include_once 'config/Database.php';
include_once 'models/Empleado.php';

$database = new Database();
$db = $database->connect();
$empleado = new Empleado($db);

if(isset($_GET['id'])) {
    $empleado->id = $_GET['id'];
    if($empleado->eliminar()) {
        header('Location: index.php');
    } else {
        echo 'Error al eliminar.';
    }
}
?>