<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idMiembro = $_POST['idMiembro'];

    // Eliminar comentarios asociados al miembro (ajusta según tu estructura de la base de datos)
    $queryEliminarComentarios = "DELETE FROM Comentarios WHERE id_miembro = $idMiembro";
    mysqli_query($conexion, $queryEliminarComentarios);

    // Eliminar al miembro
    $queryEliminarMiembro = "DELETE FROM Miembros WHERE id = $idMiembro";
    $resultado = mysqli_query($conexion, $queryEliminarMiembro);

    if ($resultado) {
        echo "Miembro eliminado con éxito.";
    } else {
        echo "Error al intentar eliminar al miembro.";
    }
} else {
    echo "Método no permitido.";
}

mysqli_close($conexion);
?>
