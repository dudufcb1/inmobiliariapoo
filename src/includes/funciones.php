<?php


define('BASE_FOLDER', __DIR__ . '/../../src');
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');

function incluirTemplate(string $nombre, bool $inicio = false)
{
  include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado(): void
{
  session_start();
  if (!$_SESSION['login']) {
    header('Location: /bienesraices/src');
  }
}
function debug($var)
{
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
  exit;
}


function s($html): string
{
  $s = htmlspecialchars($html);
  return $s;
}


function generarNombreArchivo($imagen)
{
  // Generar un nombre único para la imagen
  $nombreImagen = md5(uniqid(rand(), true));
  // Obtener la extensión del archivo subido
  $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
  $nombreArchivo = $nombreImagen . "." . $extension;

  return $nombreArchivo;
}


function vaciarCarpeta($carpeta)
{

  $directorio = opendir($carpeta);

  while ($archivo = readdir($directorio)) {

    if ($archivo != "." && $archivo != "..") {

      $ruta_completa = $carpeta . "/" . $archivo;

      if (is_file($ruta_completa)) {
        unlink($ruta_completa);
      }
    }
  }

  closedir($directorio);
}
