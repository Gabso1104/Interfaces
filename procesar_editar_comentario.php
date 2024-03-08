<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idComentario = $_POST['idComentario'];
    $nuevoComentario = $_POST['nuevoComentario'];

    $query_editar_comentario = "UPDATE Comentarios SET comentario = '$nuevoComentario' WHERE id = $idComentario";
    $result_editar_comentario = mysqli_query($conexion, $query_editar_comentario);

    if ($result_editar_comentario) {
        echo "Comentario editado con éxito.";
    } else {
        echo "Error al editar el comentario.";
    }
} else {
    echo "Método no permitido.";
}

mysqli_close($conexion);
?>
