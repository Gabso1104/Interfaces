<?php

    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $centro_escolar = $_POST['centro_escolar'];
    $fecha_registro = $_POST['fecha_registro'];

// Formatear la fecha en el formato 'YYYY-MM-DD'
$fecha_registro = date('Y-m-d', strtotime($fecha_registro));

// Consulta utilizando MySQLi
$query = "INSERT INTO miembros (nombre, apellido, sexo, telefono, correo, centro_escolar, fecha_registro)
          VALUES ('$nombre', '$apellido', '$sexo', '$telefono', '$correo', '$centro_escolar', '$fecha_registro')";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $query);

// Verificar si la consulta se ejecutó con éxito
// Verificar si la consulta se ejecutó con éxito
if ($resultado) {
    echo '
    <script>
        alert("Usuario registrado correctamente");
        window.location.href = "index.html";
    </script>';
} else {
    echo '
    <script>
        alert("Inténtalo de nuevo, miembro no almacenado");
        window.location.href = "index.html";
    </script>';
}


// Cerrar la conexión
mysqli_close($conexion);
?>
