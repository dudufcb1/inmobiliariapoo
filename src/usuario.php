<?php
// Importar conexión a la base de datos
require 'includes/config/database.php';
$db = conectarDB();

// Variables para almacenar los datos del formulario
$email = '';
$password = '';
$mensaje = '';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos del formulario
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Validar los datos del formulario
  if (empty($email) || empty($password)) {
    $mensaje = "Todos los campos son obligatorios";
  } else {
    // Encriptar la contraseña
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Crear la consulta SQL
    $query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";

    // Ejecutar la consulta SQL
    $result = mysqli_query($db, $query);

    if ($result) {
      $mensaje = "Registro guardado correctamente";
      // Limpiar los campos del formulario
      $email = '';
      $password = '';
    } else {
      $mensaje = "Error al guardar registro";
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Crear Usuario</title>
</head>

<body>
  <h1>Crear Usuario</h1>
  <form method="POST" action="">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" value="Crear Usuario">
  </form>
  <p><?php echo $mensaje; ?></p>
</body>

</html>