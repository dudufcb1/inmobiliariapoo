<?php
require './includes/app.php';
if (!isset($_SESSION)) {
  session_start();
}
$auth = $_SESSION['login'] ?? false;
if ($auth) {
  header('Location: ./admin/index.php');
}

//Autenticar el usuario


$db = conectarDB();
$errores = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (!$email) {
    $errores[] = 'El correo electrónico no es válido';
  }
  if (!$password) {
    $errores[] = 'Revisa tu contraseña';
  }
  if (empty($errores)) {
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($db, $query);
    if ($resultado->num_rows) {
      $usuario = mysqli_fetch_assoc($resultado);
      //Usar verifiación de php.
      $auth = password_verify($password, $usuario['password']);
      // el password del form y el password que recuperamos de la bd


      //Si el password es correcto, crear sesión
      if ($auth) {
        session_start();
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['login'] = true;
        header('Location: ./admin/index.php');
      }
    } else {
      $errores[] = 'No se encontró el usuario';
    }
  }
}
incluirTemplate('header', false);
?>
<main class="alinear-elementos p-8 mx-auto">
  <div class="grid place-items-center w-96">
    <?php
    if (count($errores) > 0) {
      echo '<div class="text-red-500 text-center font-bold bg-gray-200 p-4 rounded">';
      foreach ($errores as $error) {
        echo $error . '<br>';
      }
      echo '</div>';
    }
    ?>


    <h1 class="text-3xl font-bold text-center">Iniciar sesión</h1>
    <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" novalidate>
      <legend class="text-lg font-bold mb-4">Correo y contraseña</legend>
      <div class="mb-4 p-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Correo electrónico</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" required value="heyimedd@gmail.com">
      </div>
      <div class=" mb-6 p-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contraseña</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" required value="123456">
      </div>
      <div class="flex items-center justify-between p-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Iniciar sesión</button>
      </div>
    </form>

  </div>


</main>

<?php incluirTemplate('footer'); ?>