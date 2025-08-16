<?php
// Incluir las clases necesarias para la lógica de la aplicación
include_once 'config/Database.php';
include_once 'models/Empleado.php';

// Instanciar la clase de Base de Datos y conectar
$database = new Database();
$db = $database->connect();

// Instanciar la clase Empleado
$empleado = new Empleado($db);

// Obtener todos los empleados para listarlos en la tabla
$result = $empleado->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">

        <?php ?>
        <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                    if($_GET['error'] == 'email_exists') {
                        echo '<strong>Error al crear:</strong> El correo electrónico ya está en uso.';
                    } elseif($_GET['error'] == 'empty_fields') {
                        echo '<strong>Error:</strong> Por favor, complete todos los campos.';
                    } else {
                        echo 'Ha ocurrido un error inesperado.';
                    }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                    if($_GET['success'] == 'created') {
                        echo 'Empleado agregado exitosamente.';
                    } elseif($_GET['success'] == 'updated') {
                        echo 'Empleado actualizado exitosamente.';
                    }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php  ?>

        <h1 class="mb-4">Gestión de Empleados</h1>

        <div class="card">
            <div class="card-header">
                Agregar Nuevo Empleado
            </div>
            <div class="card-body">
                <form action="crear.php" method="POST">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="col">
                            <label for="cargo" class="form-label">Cargo</label>
                            <input type="text" class="form-control" name="cargo" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correo" required>
                        </div>
                        <div class="col">
                            <label for="fecha" class="form-label">Fecha de Ingreso</label>
                            <input type="date" class="form-control" name="fecha" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Empleado</button>
                </form>
            </div>
        </div>
        
        <hr>

        <h3 class="mt-4">Lista de Empleados</h3>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Correo</th>
                    <th>Fecha Ingreso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['nombreCompletoEmpleado']); ?></td>
                        <td><?php echo htmlspecialchars($row['cargoEmpleado']); ?></td>
                        <td><?php echo htmlspecialchars($row['correoElectronicoEmpleado']); ?></td>
                        <td><?php echo htmlspecialchars($row['fechaIngresoEmpleado']); ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['idEmpleado']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?php echo $row['idEmpleado']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar a este empleado?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>