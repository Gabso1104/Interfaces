<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idMiembro = $_POST['idMiembro'];
    $comentario = $_POST['comentario'];

    $query_insert_comentario = "INSERT INTO Comentarios (id_miembro, comentario) VALUES ($idMiembro, '$comentario')";
    $result_insert_comentario = mysqli_query($conexion, $query_insert_comentario);

    if ($result_insert_comentario) {
        echo "Comentario agregado con éxito.";
    } else {
        echo "Error al agregar el comentario.";
    }
} else {
    echo "Método no permitido.";
}

mysqli_close($conexion);
?>
