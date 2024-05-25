<?php
require_once __DIR__ . '/../funciones.php';

define('BASE_URL', '/bienesraices/src');


if (!isset($_SESSION)) {
  session_start();
}
$auth = $_SESSION['login'] ?? false;
$pathLogout = BASE_URL . '/logout.php';




?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="16x16" href="/bienesraices/src/img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/bienesraices/src/img/favicon-32x32.png">



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="/bienesraices/src/output.css" />

  <title>Bienes Raices</title>
</head>

<body class="bg-white">
  <header class="bg-slate-700 bg-cover bg-center md:h-3/4 <?php echo $inicio ? 'lg:h-screen" style="background-image: url(/bienesraices/src/img/header.jpg)' : ''; ?>">
    <div id="menu-container" class="mx-auto flex w-10/12 justify-between p-4">
      <div id="logo-menu" class="flex flex-row lg:flex-row">
        <div>
          <a href="/bienesraices/src/index.php"><img src="/bienesraices/src/img/logo.svg" alt="Logotipo de bienes raíces" class="h-10" /></a>
          <h1 class="ml-4 hidden text-white sm:ml-0 sm:block">
            Venta de casas y departamentos de lujo
          </h1>
          <nav id="ocultar" class="translate-x-full transform opacity-0 transition-opacity transition-transform duration-500 ease-in-out">
            <div class="ml-4 flex flex-col content-center gap-4 text-lg md:flex-row">
              <a href="nosotros.php" class="menu-link-mobile">Nosotros</a>
              <a href="anuncios.php" class="menu-link-mobile">Anuncios</a>
              <a href="blog.php" class="menu-link-mobile">Blog</a>
              <a href="contacto.php" class="menu-link-mobile">Contacto</a>
              <?php if ($auth) { ?>
                <a href="<?php echo $pathLogout ?>" class="menu-link-mobile">Cerrar sesión</a>
              <?php } ?>
            </div>
          </nav>
        </div>
      </div>
      <nav class="hidden transition-all duration-300 ease-in-out md:flex">
        <div class="ml-4 flex flex-col content-center gap-4 md:flex-row">
          <a href="nosotros.php" class="menu-link">Nosotros</a>
          <a href="anuncios.php" class="menu-link">Anuncios</a>
          <a href="blog.php" class="menu-link">Blog</a>
          <a href="contacto.php" class="menu-link">Contacto</a>
          <?php if ($auth) { ?>
            <a href="<?php echo $pathLogout ?>" class="menu-link">Cerrar sesión</a>
          <?php } ?>
        </div>
      </nav>
      <button class="ml-auto h-10 w-10 rounded-sm bg-white sm:hidden" onclick="mostrarOcultar()">
        <i class="bi bi-list"></i>
      </button>
    </div>
    <!-- barra -->
  </header>