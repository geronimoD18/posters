<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dev Rats Posts</title>
  <!-- Importando la versión actual de Bootstrap a la fecha -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- Importando la versión actual de Font Awesome a la fecha -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Mis fuentes de Google Fonts para el proyecto -->
  <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
  <?php include 'template/header.php' ?>

  <div class="container main">

<!-- Create bloggo start -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Nueva entrada</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="functions/submit_post.php" method="post">
              <label for="title">Título:</label><br>
              <input type="text" id="title" name="title"><br>

              <label for="content">Contenido:</label><br>
              <textarea id="content" name="content"></textarea><br>

              <label for="author">Autor:</label><br>
              <input type="text" id="author" name="author"><br>
          </div>
          <div class="modal-footer">
              <input type="submit" value="Guardar entrada">
            </form>
          </div>
        </div>
      </div>
    </div>

    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Crear nuevo blog</button>
<!-- Create bloggo end -->
    <hr>
<!-- Print bloggos start -->

    <div class="blogs">
      <u><h3>Entradas recientes</h3></u>
      <?php
        // Conexión a la base de datos
        include 'functions/db.php';

        // Consulta SQL para obtener todos los posts
        $sql = "SELECT * FROM posts ORDER BY date DESC";
        $result = $c->query($sql);

        // Muestra los posts
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '
                    <div>
                        <h4>'. $row["title"] .'</h4>
                        <span class="text-muted">Publicado por <strong><em>'. $row["author"] .'</em></strong> el <strong><em>'. date('d \d\e F, Y', strtotime($row["date"])) .'</em></strong></span><br>
                        <p>'. $row["content"] .'</p>
                        <center><span>...</span></center>
                    </div>';
            }
        } else {
            echo '
                <div>
                    <span class="text-muted"><strong>No hay publicaciones</strong></span>
                </div>';
        }

        // Cierra la conexión a la base de datos
        $c->close();
      ?>
    </div>
<!-- Print bloggos end -->

  </div class="container">

  <?php include 'template/footer.php' ?>

  <script>
    const toggle = document.getElementById('blogToggle');
    const form = document.getElementById('formDiv');

    toggle.addEventListener('change', function() {
      if(this.checked) {
        form.style.height = 'auto';
        form.style.overflow = 'hidden';
      } else {
        form.style.height = '0';
        form.style.overflow = 'none';
      }
    });
  </script>
</body>
</html>
