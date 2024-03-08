<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" href="https://seeklogo.com/images/C/cristiano-ronaldo-illustration-logo-7B79AC3F76-seeklogo.com.png">
  <title>INDI</title>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      
   
      min-height: 100vh;
      margin: 0;
      background-color: #ddd;
    }

    .member-container {
    margin-left: 150px;
    margin-top: 50px;
    margin-bottom: 50px;
      display: flex;
      width: 80%;
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .member-image {
      flex: 1;
      width: 25%;
      text-align: center;
      padding: 20px;
    }

    .member-image img {
      width: 100%;
      border-radius: 50%;
    }

    .member-info {
      flex: 3;
      padding: 20px;
    }

    .member-info-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    .comment-section {
      margin-top: 20px;
    }

    .comment-list {
      list-style: none;
      padding: 0;
    }

    .comment-item {
      margin-bottom: 10px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 5px;
    }

    .comment-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .comment-actions button {
      margin-left: 10px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <header>

    <div class="container">
      <input type="checkbox" name="" id="check">
      <div class="logo-container">
        <h3 class="logo"><a href="index.html"><img src="https://seeklogo.com/images/C/cristiano-ronaldo-illustration-logo-7B79AC3F76-seeklogo.com.png" alt="Logo-BICHO"></a><a
            href="index.html">BICHO</a></h3>
      </div>
      <div class="nav-btn">
        <div class="nav-links">
          <ul>
            <li class="nav-link" style="--i: .6s">
              <a href="index.html">Inicio</a>
            </li>
            <li class="nav-link" style="--i: .85s">
            <a href="clubbicholovers.php">Club BichoLovers</a>
            </li>
            <li class="nav-link" style="--i: 1.1s">
              <a>Equipos<i class="fas fa-caret-down"></i></a>
              <div class="dropdown">
                <ul>
                  <li class="dropdown-link">
                    <a href="general.html">Real Madrid</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="itsi.html">Manchester United</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="contaduria.html">Juventus</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="flexible.html">Al Nassar</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>
            <li class="nav-link" style="--i: 1.35s">
              <a href="planta-docente.html">Titulos</a>
            </li>
            <li class="nav-link" style="--i: 1.6s">
              <a>Noticias<i class="fas fa-caret-down"></i></a>
              <div class="dropdown">
                <ul>
                  <li class="dropdown-link">
                    <a href="noticias.html">Noticias</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="deportes.html">Partidos</a>
                  </li>
                 
                  <div class="arrow-2"></div>
                </ul>
              </div>
            </li>
            <li class="nav-link" style="--i: 1.85s">
            <a href="nuevo_ingreso.html" target="_blank">Registro</a>
            </li>
            <li class="nav-link" style="--i: 2.1s">
              <a href="contacto.html">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="hamburger-menu-container">
        <div class="hamburger-menu">
          <div></div>
        </div>
      </div>
    </div>
  </header>

  <section class="container-of-lay">
    <?php
    include 'conexion.php';

    $query_miembros = "SELECT * FROM Miembros";
    $result_miembros = mysqli_query($conexion, $query_miembros);

    if (mysqli_num_rows($result_miembros) > 0) {
        while ($row_miembro = mysqli_fetch_assoc($result_miembros)) {
            $id_miembro = $row_miembro['id'];

            echo "<div class='member-container'>";
            echo "<div class='member-image'>";
        // Lógica para seleccionar la ruta de la imagen según el género
           $ruta_imagen = $row_miembro['sexo'] === 'masculino' ? './imagenes/hombre.png' : './imagenes/mujer.png';
          
            echo "<img src='" . $ruta_imagen . "' alt='Miembro'>";
            echo "<p>Género: " . $row_miembro['sexo'] . "</p>";
            // Botón para eliminar al miembro
            echo "<button class='eliminar-miembro' data-idmiembro='" . $id_miembro . "'>Eliminar Miembro</button>";

            echo "</div>";

            echo "<div class='member-info'>";
            echo "<div class='member-info-row'>";
            echo "<h2>" . $row_miembro['nombre'] . " " . $row_miembro['apellido'] . "</h2>";
            echo "</div>";

          

            echo "<div class='member-info-row'>";
            echo "<p>Correo: " . $row_miembro['correo'] . "</p>";
            echo "<p>Número: " . $row_miembro['telefono'] . "</p>";
            echo "</div>";

            echo "<div class='member-info-row'>";
            echo "<p>Fecha Registro: " . $row_miembro['fecha_registro'] . "</p>";
            echo "</div>";

            $query_comentarios = "SELECT * FROM Comentarios WHERE id_miembro = $id_miembro";
            $result_comentarios = mysqli_query($conexion, $query_comentarios);

            if (mysqli_num_rows($result_comentarios) > 0) {
                echo "<div class='comment-section'>";
                echo "<h3>Comentarios</h3>";
                echo "<ul class='comment-list'>";
                while ($row_comentario = mysqli_fetch_assoc($result_comentarios)) {
                    echo "<li class='comment-item' data-idcomentario='" . $row_comentario['id'] . "' data-idmiembro='" . $id_miembro . "'>";
                    echo "<p>" . $row_comentario['comentario'] . "</p>";
                    echo "<div class='comment-actions'>";
                    echo "<button onclick='editarComentario(this)'>Editar</button>";
                    echo "<button onclick='borrarComentario(this)'>Borrar</button>";
                    echo "</div>";
                    echo "</li>";
                }
                echo "</ul>";
                // Cambios en la asignación del ID para el textarea y el botón
                echo "<textarea class='commentInput' id='commentInput-" . $id_miembro . "' rows='4' placeholder='Agregar comentario'></textarea>";
                echo "<button onclick='agregarComentario(" . $id_miembro . ")'>Enviar Comentario</button>";
                echo "</div>";
            } else {
                echo "<p>No hay comentarios.</p>";
                // Añadir un textarea y un botón para usuarios sin comentarios
                echo "<div class='comment-section'>";
                echo "<h3>Agregar Comentario</h3>";
                echo "<ul class='comment-list'></ul>";
                echo "<textarea class='commentInput' id='commentInput-" . $id_miembro . "' rows='4' placeholder='Agregar comentario'></textarea>";
                echo "<button onclick='agregarComentario(" . $id_miembro . ")'>Enviar Comentario</button>";
                echo "</div>";
            }

            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No hay miembros registrados.</p>";
    }

    mysqli_close($conexion);
    ?>
</section>


  
    <script>
function agregarComentario(idMiembro) {
    var commentInput = document.querySelector('#commentInput-' + idMiembro);
    var commentText = commentInput.value;

    if (commentText.trim() !== '') {
        // Enviar comentario al servidor mediante AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Manejar la respuesta del servidor si es necesario
                // (por ejemplo, actualizar la lista de comentarios)
                console.log(xhr.responseText);
            }
        };
        xhr.open("POST", "procesar_comentario.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("idMiembro=" + idMiembro + "&comentario=" + encodeURIComponent(commentText));

        // Limpiar el área de comentarios después de enviar
        
        commentInput.value = '';
        
    }
}

    function agregarComentarioMiembro(idMiembro) {
        agregarComentario(idMiembro);
    }
  
    function editarComentario(button) {
        var commentItem = button.parentNode.parentNode;
        var idComentario = commentItem.getAttribute('data-idcomentario');
        var nuevoComentario = prompt('Editar comentario:', commentItem.querySelector('p').innerText);

        if (nuevoComentario !== null && nuevoComentario.trim() !== '') {
            // Enviar la solicitud de edición al servidor mediante AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Manejar la respuesta del servidor si es necesario
                    console.log(xhr.responseText);
                    // Actualizar el comentario en la interfaz de usuario
                    commentItem.querySelector('p').innerText = nuevoComentario;
                }
            };
            xhr.open("POST", "procesar_editar_comentario.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("idComentario=" + idComentario + "&nuevoComentario=" + nuevoComentario);
        }
    }

    function borrarComentario(button) {
        var commentItem = button.parentNode.parentNode;
        var idComentario = commentItem.getAttribute('data-idcomentario');
        var confirmarBorrado = confirm('¿Estás seguro de que deseas borrar este comentario?');

        if (confirmarBorrado) {
            // Enviar la solicitud de borrado al servidor mediante AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Manejar la respuesta del servidor si es necesario
                    console.log(xhr.responseText);
                    // Eliminar el comentario de la interfaz de usuario
                    commentItem.parentNode.removeChild(commentItem);
                }
            };
            xhr.open("POST", "procesar_borrar_comentario.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("idComentario=" + idComentario);
        }
    }

    function eliminarMiembro(idMiembro) {
    var confirmarEliminar = confirm("¿Estás seguro de que deseas eliminar a este miembro?");

    if (confirmarEliminar) {
      // Enviar la solicitud al servidor para eliminar al miembro
      fetch("procesar_eliminar_miembro.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "idMiembro=" + idMiembro,
      })
        .then(response => response.text())
        .then(message => {
          alert(message);
          // Recargar la página después de la eliminación (puedes hacer esto de manera más elegante)
          location.reload();
        })
        .catch(error => console.error("Error al enviar la solicitud:", error));
    }
  }

    // Asociar el evento click a los botones de eliminación de miembros
    document.addEventListener("DOMContentLoaded", function () {
    var botonesEliminarMiembro = document.querySelectorAll('.eliminar-miembro');

    botonesEliminarMiembro.forEach(function (boton) {
      boton.addEventListener('click', function () {
        var idMiembro = boton.getAttribute('data-idmiembro');
        eliminarMiembro(idMiembro);
      });
    });
  });

    </script>
  </body>

 
  <footer>
    <section>
      <div class="container-foo">
        <div class="text-foo">
          <p><i class="fas fa-map-marker-alt"></i>QUITO, ECUADOR</p>
          <p><i class="fas fa-phone"></i>Tel: 0983325155</p>
          <p><i class="fas fa-envelope"></i>Correo: BICHOLOVERS@BICHO.com</p>
          <div class="copy-agra">
            <p class="neg">Espe, BichoLovers. Todos los derechos reservados &copy;</p>
          </div>
        </div>
        <img class="image-footer" src="https://seeklogo.com/images/C/cristiano-ronaldo-illustration-logo-7B79AC3F76-seeklogo.com.png" alt="">
        <div class="logo-redes">
          <a href="https://www.facebook.com/indixsiempre" target="_blank"><i class="fab fa-facebook-square"></i></a>
          <i class="fab fa-twitter-square"></i>
        </div>
      </div>
    </section>
  </footer>

  <script src="js/script.js"></script>
</body>

</html>