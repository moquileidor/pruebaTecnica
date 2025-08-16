<?php
// Incluir las clases necesarias
include_once 'config/Database.php';
include_once 'models/Empleado.php';

// Instanciar objetos
$database = new Database();
$db = $database->connect();
$empleado = new Empleado($db);

// Procesar el formulario si es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empleado->id = $_POST['id'];
    $empleado->nombre = $_POST['nombre'];
    $empleado->cargo = $_POST['cargo'];
    $empleado->correo = $_POST['correo'];
    $empleado->fecha = $_POST['fecha'];

    if ($empleado->actualizar()) {
        header('Location: index.php?success=updated');
        exit();
    } else {
        // Redirigir de vuelta al formulario de edición con un error
        header('Location: editar.php?id=' . $empleado->id . '&error=email_exists');
        exit();
    }
} else {
    // Si es GET, mostrar el formulario
    $empleado->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID no encontrado.');
    $empleado->leerUno();
    
    if($empleado->nombre == null){
        die('Empleado no encontrado.');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        
        <?php if(isset($_GET['error']) && $_GET['error'] == 'email_exists'): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> El correo electrónico que intentas guardar ya está en uso por otro registro.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h1>Editar Empleado</h1>
            </div>
            <div class="card-body">
                <form action="editar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $empleado->id; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($empleado->nombre); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="cargo" class="form-label">Cargo</label>
                        <input type="text" class="form-control" name="cargo" value="<?php echo htmlspecialchars($empleado->cargo); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" value="<?php echo htmlspecialchars($empleado->correo); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de Ingreso</label>
                        <input type="date" class="form-control" name="fecha" value="<?php echo htmlspecialchars($empleado->fecha); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar Empleado</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}
?>