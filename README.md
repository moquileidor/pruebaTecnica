# Gestión de Empleados - Prueba Técnica PHP

Aplicación web para la gestión de empleados (CRUD) desarrollada con PHP Orientado a Objetos, MySQL y Bootstrap. El proyecto cumple con los requisitos de una prueba técnica para un puesto de aprendiz como desarrollador de software, demostrando habilidades en desarrollo backend, manejo de bases de datos y construcción de interfaces funcionales.

## ✨ Características Principales

* **Operaciones CRUD Completas:** Crear, Leer, Actualizar y Eliminar empleados.
* **Programación Orientada a Objetos (OOP):** La lógica de negocio está encapsulada en clases (`Database`, `Empleado`) para un código más limpio, mantenible y escalable.
* **Seguridad:** Implementación de consultas preparadas con PDO para prevenir inyecciones SQL.
* **Validación de Datos:**
    * Validación en el servidor para campos obligatorios.
    * Validación de correo electrónico único para evitar registros duplicados.
* **Interfaz de Usuario Amigable:** Interfaz desarrollada con Bootstrap 5 para una apariencia limpia y responsiva, con alertas dinámicas para feedback al usuario.
* **Código Limpio y Organizado:** Estructura de carpetas (`config`, `models`) que separa la lógica de la base de datos, el modelo de negocio y las vistas.

## 🛠️ Tecnologías Utilizadas

* **Backend:** PHP 8 (Orientado a Objetos)
* **Base de Datos:** MySQL
* **Frontend:** HTML5, Bootstrap 5
* **Entorno de Desarrollo:** XAMPP (Apache, MariaDB/MySQL)

## 🚀 Instalación y Ejecución

Sigue estos pasos para poner en marcha el proyecto en tu máquina local.

### Requisitos Previos

* Tener instalado un entorno de desarrollo web como [XAMPP](https://www.apachefriends.org/index.html).

### Pasos

1.  **Clonar el Repositorio**
    * Clona este proyecto en tu computadora.

2.  **Configurar la Base de Datos (Tienes 2 opciones)**

    * **Opción A (Recomendada): Dejar que el script lo haga todo.**
        1.  Inicia Apache y MySQL en XAMPP.
        2.  Abre `http://localhost/phpmyadmin`.
        3.  En la página principal, ve a la pestaña **"Importar"**.
        4.  Selecciona el archivo `script.sql` y ejecútalo. El script creará la base de datos y la tabla automáticamente.

    * **Opción B: Si ya creaste la base de datos manualmente.**
        1.  Inicia Apache y MySQL en XAMPP.
        2.  Abre `http://localhost/phpmyadmin`.
        3.  Haz clic en la base de datos `prueba_tecnica` que ya creaste en el panel izquierdo.
        4.  Ve a la pestaña **"SQL"**.
        5.  Copia y pega **solamente el siguiente código** (que es para crear la tabla) y ejecútalo:
            ```sql
            CREATE TABLE empleados (
                idEmpleado INT PRIMARY KEY AUTO_INCREMENT,
                nombreCompletoEmpleado VARCHAR(100) NOT NULL,
                cargoEmpleado VARCHAR(50) NOT NULL,
                correoElectronicoEmpleado VARCHAR(100) NOT NULL,
                fechaIngresoEmpleado DATE NOT NULL
            );
            ```

3.  **Configurar el Proyecto**
    * Mueve la carpeta del proyecto al directorio `htdocs` de tu instalación de XAMPP (ej: `C:/xampp/htdocs/pruebaTecnica`).

4.  **Ejecutar la Aplicación**
    * Abre tu navegador y navega a: `http://localhost/pruebaTecnica/`.
    * Abre tu navegador y navega a la siguiente URL: `http://localhost/pruebaTecnica/`.
    * ¡La aplicación debería estar funcionando!
