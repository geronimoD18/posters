<?php
// Conexión a la base de datos
include 'db.php';

// Verifica la conexión
if ($c->connect_error) {
  die("Error al conectar a la base de datos: " . $c->connect_error);
}

// Obtiene los datos del formulario
$title = $_POST["title"];
$content = $_POST["content"];
$author = $_POST["author"];

// Valida los datos
if (empty($title) || empty($content) || empty($author)) {
  die("Por favor, rellena todos los campos.");
}

// Prepara la consulta SQL
$sql = "INSERT INTO posts (title, content, author) VALUES ('$title', '$content', '$author')";

// Ejecuta la consulta SQL
if ($c->query($sql) === TRUE) {
  echo "Post publicado correctamente.";
  echo '<a href="show_posts.php">Ver todos los posts</a>';
} else {
  echo "Error al publicar el post: " . $c->error;
}

// Cierra la conexión a la base de datos
$c->close();
?>
