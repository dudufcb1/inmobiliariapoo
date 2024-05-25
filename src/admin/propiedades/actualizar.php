<?php


use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';
$auth = estaAutenticado();


incluirTemplate('header');

$datos = $_GET; // Conseguimos los datos actuales del formulario.
$id = $datos['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); //No solo valida, lo convierte a entero también.

if (!$id) {
  header('Location: ../');
}


/* Consulta propiedades */

/* Esta consulta sirve para asignar los valores a las variables y pre-llenar los campos */

$propiedad = Propiedad::find($id);

//consulta vendedores
$consulta = "SELECT * FROM vendedores";
$resultadoConsulta = mysqli_query($db, $consulta);

/* Llenado de los campos con lo que tenemos en base de datos */

$errores = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $args = $_POST['propiedad']; //Nota obtenemos todos los datos del formulario y los colocamos en $args, para luego pasarlos abajo a sincronizar
  $propiedad->sincronizar($args);
  $errores = $propiedad->validar();

  if ($_FILES['propiedad']['tmp_name']['imagen']) {
    // Generar un nombre único para la imagen
    $nombreImagen = md5(uniqid(rand(), true));
    // Obtener la extensión del archivo subido
    $extension = pathinfo($_FILES['propiedad']['name']['imagen'], PATHINFO_EXTENSION);
    $nombreArchivo = $nombreImagen . "." . $extension;
    /* Imagen operaciones creación, todavía no se mueve*/
    $imagenfile = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
    $propiedad->setImagen($nombreArchivo);
  }

  $carpetaImagenes = '../../imagenes';


  if (empty($errores)) {
    if (isset($imagenfile)) {
      $imagenfile->save($carpetaImagenes . "/" . $nombreArchivo);
    }
    $resultado = $propiedad->guardar();
  }
  if (isset($resultado)) {
    $host = $_SERVER['HTTP_HOST'];
    $extra = '/bienesraices/src/admin?resultado=2';
    header("Location: http://$host$extra");
  }
}


?>
<main class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
  <?php foreach ($errores as $error) : ?>
    <p class="text-red-500 font-bold text-base"><?php echo $error; ?></p>
  <?php endforeach; ?>


  <h1 class="text-4xl font-thin text-gray-800 mb-6">Actualizar Propiedad</h1>
  <a href="/bienesraices/src/admin/index.php" class="inline-block mb-6 px-6 py-2 bg-orange-500 text-white font-semibold rounded-md hover:bg-orange-600">Volver</a>
  <form action="" method="post" class="space-y-6" enctype="multipart/form-data">
    <fieldset class="border border-gray-300 p-4 rounded-md">
      <legend class="text-lg font-semibold text-gray-800">Información general</legend>
      <div class="mt-4">
        <label for="titulo" class="block text-gray-700">Titulo</label>
        <input type="text" id="titulo" name="propiedad[titulo]" value='<?php echo s($propiedad->titulo); ?>' placeholder="Titulo de la propiedad" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500 w-full">
      </div>
      <div class="mt-4">
        <label for="precio" class="block text-gray-700">Precio</label>
        <input type="text" id="precio" value='<?php echo s($propiedad->precio); ?>' name="propiedad[precio]" placeholder="Precio de la propiedad" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500 w-full">
      </div>
      <div class="mt-4">
        <label for="imagen" class="block text-gray-700">Imagen</label>
        <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png" class="mt-1 w-full">
        <?php if ($propiedad->imagen) : ?>
          <img src="../../imagenes/<?php echo $propiedad->imagen; ?>" alt="Hola" class="w-auto h-48">
        <?php endif ?>
      </div>
      <div class="mt-4">
        <label for="descripcion" class="block text-gray-700">Descripción</label>
        <textarea id="descripcion" name="propiedad[descripcion]" placeholder="Descripción de la propiedad" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500 w-full"><?php echo s($propiedad->descripcion); ?></textarea>
      </div>
    </fieldset>

    <fieldset class="border border-gray-300 p-4 rounded-md">
      <legend class="text-lg font-semibold text-gray-800">Información de la propiedad</legend>
      <div class="mt-4">
        <label for="habitaciones" class="block text-gray-700">Habitaciones</label>
        <input type="number" id="habitaciones" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones); ?>" placeholder="Número de habitaciones ej.3" min="1" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500 w-full">
      </div>
      <div class="mt-4">
        <label for="wc" class="block text-gray-700">Baños</label>
        <input type="number" id="wc" name="propiedad[wc]" value="<?php echo s($propiedad->wc); ?>" placeholder="Número de baños ej.3" min="1" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500 w-full">
      </div>
      <div class="mt-4">
        <label for="estacionamiento" class="block text-gray-700">Plazas</label>
        <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" value="<?php echo ($propiedad->estacionamiento); ?>" placeholder="Número de plazas ej.3" min="1" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500 w-full">
      </div>
    </fieldset>

    <fieldset class="border border-gray-300 p-4 rounded-md">
      <legend class="text-lg font-semibold text-gray-800">Vendedor</legend>
      <select id="vendedores_id" name="propiedad[vendedores_id]" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500 w-full">
        <option value="">Selecciona vendedor</option>
        <?php while ($row = mysqli_fetch_assoc($resultadoConsulta)) : ?>
          <option <?php echo $propiedad->vendedores_id === $row['id'] ? 'selected' : ''; ?> value='<?php echo $row['id'] ?>'> <?php echo $row['nombre'] . " " . $row['apellido'] ?> </option>
        <?php endwhile ?>
      </select>
    </fieldset>

    <button type="submit" class="w-full mt-8 px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Crear Propiedad</button>
  </form>
</main>
<?php incluirTemplate('footer'); ?>