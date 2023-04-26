
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts - Dev Rat Posts</title>
    <!-- Importando la versión actual de Bootstrap a la fecha -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Importando la versión actual de Font Awesome a la fecha -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Mis fuentes de Google Fonts para el proyecto -->
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include "template/header.php"; ?>

    <div class="container main">
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
                    <h2>'. $row["title"] .'</h2>
                    <p>'. $row["content"] .'</p>
                    <span class="text-muted">Publicado por <strong><em>'. $row["author"] .'</en></strong> el <strong><em>'. date('d \d\e F, Y', strtotime($row["date"])) .'</en></strong></span>
                    <hr><br>
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

    <?php include "template/footer.php"; ?>

    <script>
        //Función para volver al principio de la página
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>