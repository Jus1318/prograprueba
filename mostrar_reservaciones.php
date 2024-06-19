<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Reservaciones</title>
</head>
<body>
    <h1>Lista de Reservaciones</h1>
    <?php
    $file = "reservaciones.txt";
    if (file_exists($file)) {
        $reservations = file($file, FILE_IGNORE_NEW_LINES);
        if (!empty($reservations)) {
            echo "<table border='1'>";
            echo "<tr><th>Hotel</th><th>Nombre</th><th>Apellido</th><th>Teléfono</th><th>Fecha de Reservación</th><th>Observaciones</th></tr>";
            foreach ($reservations as $reservation) {
                list($hotel, $nombre, $apellido, $telefono, $fecha_reservacion, $observaciones) = explode(",", $reservation);
                echo "<tr>";
                echo "<td>" . htmlspecialchars($hotel) . "</td>";
                echo "<td>" . htmlspecialchars($nombre) . "</td>";
                echo "<td>" . htmlspecialchars($apellido) . "</td>";
                echo "<td>" . htmlspecialchars($telefono) . "</td>";
                echo "<td>" . htmlspecialchars($fecha_reservacion) . "</td>";
                echo "<td>" . htmlspecialchars($observaciones) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No hay reservaciones.";
        }
    } else {
        echo "No hay reservaciones.";
    }
    ?>
    <br><br>
    <a href="index.html">Hacer otra reservación</a>
</body>
</html>