<?php
//Importar
// require __DIR__ . '/../config/database.php'; // IMPORTANTE EL __DIR__ para que funcione en la raiz del directorio y no desde donde incluimos este archivo ejemplo en este caso lo llamamos desde index, supongo que es mejor el DIR por que no siempre los archivoos donde lo invoquemos estaran en el mismo nivel.
$db = conectarDB();
//Consultar

$query = "SELECT * FROM propiedades LIMIT $propiedadesLimite";



//Obtener resultado

$resultado = mysqli_query($db, $query);

?>
<?php
$className = $propiedadesPlace === 'index' ? "tarjeta-portada-contenedor-principal" : "tarjeta-portada-propiedades";
?>

<!-- Usar un bucle para mostrar cada fila de la tabla -->
<?php while ($row = mysqli_fetch_assoc($resultado)) : ?>

  <div class="<?php echo $className ?>">
    <img src="./imagenes/<?php echo $row['imagen'] ?>" alt="Casa en el lago" />
    <div class="mt-4 px-4">
      <h2 class="mt-4 text-center text-3xl font-thin">
        <?php echo $row['titulo'] ?>
      </h2>
      <p class="mt-2 text-xl">
        <?php echo $row['descripcion'] ?>
      </p>
      <p class="mt-4 text-3xl text-orange-700">$<?php echo $row['precio'] ?></p>
      <ul class="mt-4 flex justify-between gap-2 px-6">
        <li class="mr-4 flex items-center justify-center">
          <img src="./img/icono_wc.svg" alt="" class="h-10" /><span class="ml-2 font-bold"><?php echo $row['wc'] ?></span>
        </li>
        <li class="mr-4 flex items-center justify-center">
          <img src="./img/icono_dormitorio.svg" alt="" class="h-10" /><span class="ml-2 font-bold"><?php echo $row['habitaciones'] ?></span>
        </li>
        <li class="mr-4 flex items-center justify-center">
          <img src="./img/icono_estacionamiento.svg" alt="" class="h-10" /><span class="ml-2 font-bold"> <?php echo $row['estacionamiento'] ?></span>
        </li>
      </ul>
      <a href="../src/anuncio.php?id=<?php echo $row['id'] ?>" class="boton-naranja"> Ver Propiedad </a>
    </div>
  </div>
<?php endwhile ?>