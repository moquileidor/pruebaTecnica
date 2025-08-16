<?php
class Empleado {
    private $conn;
    private $table = 'empleados';

    // Propiedades
    public $id;
    public $nombre;
    public $cargo;
    public $correo;
    public $fecha;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function listar() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY fechaIngresoEmpleado DESC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function leerUno() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE idEmpleado = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->nombre = $row['nombreCompletoEmpleado'];
            $this->cargo = $row['cargoEmpleado'];
            $this->correo = $row['correoElectronicoEmpleado'];
            $this->fecha = $row['fechaIngresoEmpleado'];
        }
    }
    
    
    public function isCorreoUnico() {
        $query = 'SELECT idEmpleado FROM ' . $this->table . ' WHERE correoElectronicoEmpleado = :correo';
        $params = [':correo' => $this->correo];

        // Si estamos actualizando, debemos excluir el ID del propio empleado
        if ($this->id) {
            $query .= ' AND idEmpleado != :id';
            $params[':id'] = $this->id;
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);

        if ($stmt->rowCount() > 0) {
            return false; // El correo ya existe
        }
        return true; // El correo es único
    }



    public function crear() {
        // validar que el correo sea único
        if (!$this->isCorreoUnico()) {
            return false; // Retorna falso si el correo ya existe
        }
        
        $query = 'INSERT INTO ' . $this->table . ' SET nombreCompletoEmpleado = :nombre, cargoEmpleado = :cargo, correoElectronicoEmpleado = :correo, fechaIngresoEmpleado = :fecha';
        $stmt = $this->conn->prepare($query);

        // Limpiar datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->cargo = htmlspecialchars(strip_tags($this->cargo));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));

        // Vincular datos
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':cargo', $this->cargo);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':fecha', $this->fecha);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function actualizar() {
        // Validar que el nuevo correo sea único 
        if (!$this->isCorreoUnico()) {
            return false; // El correo ya está en uso por otra persona
        }

        $query = 'UPDATE ' . $this->table . ' SET nombreCompletoEmpleado = :nombre, cargoEmpleado = :cargo, correoElectronicoEmpleado = :correo, fechaIngresoEmpleado = :fecha WHERE idEmpleado = :id';
        $stmt = $this->conn->prepare($query);

        // Limpiar datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->cargo = htmlspecialchars(strip_tags($this->cargo));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincular datos
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':cargo', $this->cargo);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function eliminar() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE idEmpleado = :id';
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>