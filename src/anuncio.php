<?php

require './includes/app.php';
incluirTemplate('header', false);

$db = conectarDB();

$id = $_GET['id'];
if (!empty($id) && is_numeric($id)) {
  $query = "SELECT * FROM propiedades WHERE id = $id";
  $resultado = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($resultado);

  if ($row) {
  } else {
    header("Location: ./index.php");
  }
} else {
  header("Location: ./index.php");
}

$query = "SELECT * FROM propiedades WHERE id = $id";
$resultado = mysqli_query($db, $query);

$row = mysqli_fetch_assoc($resultado);


/* ESTE FUNCIONA, PERO HASTA CHEQUEAR LA BASE DE DATOS
if (!$resultado->num_rows) {
  header("Location: ./index.php");
} */


?>
<main class="mx-auto max-w-5xl px-8">
  <section class="py-16 px-8 bg-gray-100">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
      <div class="flex justify-center mr-10 mt-10">
        <img src="./imagenes/<?php echo $row['imagen']; ?>" alt="<?php echo $row['titulo']; ?>" class="w-full h-auto rounded-lg shadow-lg">
      </div>
      <div class="flex flex-col justify-center">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-6"><?php echo $row['titulo']; ?></h1>
        <p class="text-lg text-gray-700 mb-4"><?php echo $row['descripcion']; ?></p>
        <p class="text-lg text-gray-700 mb-4"><span class="font-bold">Precio:</span> $<?php echo $row['precio']; ?></p>
        <div class="flex items-center text-lg text-gray-700 mb-4">
          <img src="./img/icono_wc.svg" alt="Baños" class="h-6 w-6 mr-2">
          <span class="font-bold mr-4"><?php echo $row['wc']; ?> Baños</span>
          <img src="./img/icono_dormitorio.svg" alt="Habitaciones" class="h-6 w-6 mr-2">
          <span class="font-bold mr-4"><?php echo $row['habitaciones']; ?> Habitaciones</span>
          <img src="./img/icono_estacionamiento.svg" alt="Estacionamiento" class="h-6 w-6 mr-2">
          <span class="font-bold"><?php echo $row['estacionamiento']; ?> Plazas</span>
        </div>
        <a href="anuncios.php" class="inline-block mt-8 px-6 py-3 text-lg font-semibold text-white bg-orange-500 hover:bg-orange-600 rounded-lg shadow-md transition-colors duration-300">Ver todas</a>
      </div>
    </div>
  </section>


</main>







<?php
incluirTemplate('footer');
?>