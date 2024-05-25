<?php
require '../includes/app.php';
$auth = estaAutenticado();

use App\Propiedad;


//CONSULTAR PROPIEDADES



incluirTemplate('header', false);
$mensaje = $_GET['resultado'] ?? null;
// var_dump($mensaje);


//BORRAR PROPIEDAD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  /* $propiedad = Propiedad::find($id); */
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);
  if ($id) {
    $propiedad = Propiedad::find($id);
    $mensaje = $propiedad->delete();
  }
}


//Metodo para obtener las propiedades.
$propiedades = Propiedad::all();

?>
<main class="alinear-elementos">
  <h1 class="text-4xl font-thin text-slate-600">Administrador</h1>
  <?php if ($mensaje == 1) {
    echo "<p class='text-2xl text-amber-500'>Propiedad creada correctamente!</p>";
  } elseif ($mensaje == 2) {
    echo "<p class='text-2xl text-amber-500'>Propiedad actualizada correctamente!</p>";
  } elseif ($mensaje == 3) {
    echo "<p class='text-2xl text-amber-500'>Propiedad eliminada correctamente!</p>";
  }
  ?>
  <nav class="flex gap-4">
    <a href="propiedades/crear.php" class="boton-naranja-inline">Crear Propiedad</a>

  </nav>
  <table class="min-w-full bg-white border border-gray-300">
    <thead>
      <tr>
        <th class="py-2 px-4 border-b">ID</th>
        <th class="py-2 px-4 border-b">Titulo</th>
        <th class="py-2 px-4 border-b">Imagen</th>
        <th class="py-2 px-4 border-b">Precio</th>
        <th class="py-2 px-4 border-b">Acciones</th>
      </tr>
    </thead>
    <?php foreach ($propiedades as $propiedad) : ?>
      <tr>
        <td class="py-2 px-4 border-b"> <?php echo s($propiedad->id); ?> </td>
        <td class="py-2 px-4 border-b"><?php echo s($propiedad->titulo); ?></td>
        <td class="py-2 px-4 border-b"><img src="../imagenes/<?php echo s($propiedad->imagen); ?> " alt="" class="h-48"></td>
        <td class="py-2 px-4 border-b">$<?php echo s($propiedad->precio); ?></td>
        <td class="py-2 px-4 border-b">
          <a href="../admin/propiedades/actualizar.php?id=<?php echo s($propiedad->id); ?>" class="text-blue-500 hover:text-blue-700">Actualizar</a>
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
            <input type="submit" value="Eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta propiedad?')">
          </form>
        </td>
      </tr>
    <?php endforeach ?>


    </tr>
    </tbody>
  </table>

</main>

<?php
//cerrar bd
mysqli_close($db);
incluirTemplate('footer');
?>