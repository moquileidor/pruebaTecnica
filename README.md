# Gestión de Empleados - Prueba Técnica PHP

Aplicación web para la gestión de empleados (CRUD) desarrollada con PHP Orientado a Objetos, MySQL y Bootstrap. El proyecto cumple con los requisitos de una prueba técnica para un puesto de desarrollador de software, demostrando habilidades en desarrollo backend, manejo de bases de datos y construcción de interfaces funcionales.

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
    * Clona este proyecto en tu computadora o descarga el archivo ZIP.

2.  **Configurar la Base de Datos**
    * Inicia los servicios de **Apache** y **MySQL** desde el panel de control de XAMPP.
    * Abre tu navegador y ve a `http://localhost/phpmyadmin`.
    * Crea una nueva base de datos con el nombre `prueba_tecnica`.
    * Selecciona la base de datos creada, ve a la pestaña **"Importar"**, selecciona el archivo `script.sql` de este proyecto y ejecútalo.

3.  **Configurar el Proyecto**
    * Mueve la carpeta completa del proyecto al directorio `htdocs` de tu instalación de XAMPP (ej: `C:/xampp/htdocs/`).
    * Asegúrate de que la carpeta se llame `pruebaTecnica` (o el nombre que prefieras).

4.  **Ejecutar la Aplicación**
    * Abre tu navegador y navega a la siguiente URL: `http://localhost/pruebaTecnica/`.
    * ¡La aplicación debería estar funcionando!