<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y validar datos
    $hotel = trim($_POST["hotel"]);
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $telefono = trim($_POST["telefono"]);
    $fecha_reservacion = trim($_POST["fecha_reservacion"]);
    $observaciones = trim($_POST["observaciones"]);

    // Validaciones
    if (empty($hotel) || empty($nombre) || empty($apellido) || empty($telefono) || empty($fecha_reservacion)) {
        die("Todos los campos son requeridos.");
    }

    if (!preg_match("/^[0-9]{10}$/", $telefono)) {
        die("Teléfono no válido. Debe contener 10 dígitos.");
    }

    // Guardar datos en un archivo plano
    $data = "$hotel,$nombre,$apellido,$telefono,$fecha_reservacion,$observaciones\n";
    file_put_contents("reservations.txt", $data, FILE_APPEND);

    // Redireccionar a mostrar las reservaciones
    header("Location: show_reservations.php");
    exit();
} else {
    die("Método de solicitud no válido.");
}
