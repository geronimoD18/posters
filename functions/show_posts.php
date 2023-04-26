<?php
// Conexión a la base de datos
include 'db.php';

// Verifica la conexión
if ($c->connect_error) {
  die("Error al conectar a la base de datos: " . $c->connect_error);
}

// Consulta SQL para obtener todos los posts
$sql = "SELECT * FROM posts ORDER BY date DESC";
$result = $c->query($sql);

// Muestra los posts
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<h2>" . $row["title"] . "</h2>";
    echo "<p>" . $row["content"] . "</p>";
    echo "<p>Publicado por " . $row["author"] . " el " . $row["date"] . "</p>";
  }
} else {
  echo "No hay posts disponibles.";
}

// Cierra la conexión a la base de datos
$c->close();
?>
