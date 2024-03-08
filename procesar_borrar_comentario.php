<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idComentario = $_POST['idComentario'];

    $query_borrar_comentario = "DELETE FROM Comentarios WHERE id = $idComentario";
    $result_borrar_comentario = mysqli_query($conexion, $query_borrar_comentario);

    if ($result_borrar_comentario) {
        echo "Comentario borrado con éxito.";
    } else {
        echo "Error al borrar el comentario.";
    }
} else {
    echo "Método no permitido.";
}

mysqli_close($conexion);
?>
