<?php
include_once 'config/Database.php';
include_once 'models/Empleado.php';

$database = new Database();
$db = $database->connect();
$empleado = new Empleado($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validación de campos vacíos
    if (empty($_POST['nombre']) || empty($_POST['cargo']) || empty($_POST['correo']) || empty($_POST['fecha'])) {
        header('Location: index.php?error=empty_fields');
        exit();
    }

    $empleado->nombre = $_POST['nombre'];
    $empleado->cargo = $_POST['cargo'];
    $empleado->correo = $_POST['correo'];
    $empleado->fecha = $_POST['fecha'];

    // Intentar crear el empleado
    if ($empleado->crear()) {
        header('Location: index.php?success=created'); // Éxito
        exit();
    } else {
        // Falla (posiblemente correo duplicado)
        header('Location: index.php?error=email_exists'); // Redirigir con error específico
        exit();
    }
}
?>