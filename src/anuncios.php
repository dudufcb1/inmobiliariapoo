<?php
require './includes/funciones.php';
incluirTemplate('header', false);
?>
<main class="mx-auto max-w-5xl px-8">
  <section class="p-8">
    <h2 class="my-4 text-3xl">Casas y departamentos en venta</h2>
    <!--  -->
    <div class="grid place-items-center gap-x-2 gap-y-4 md:grid-cols-2 lg:grid-cols-3">
      <?php
      $propiedadesLimite = 100;
      $propiedadesPlace = 'anuncios';
      include 'includes/templates/anuncios.php';
      ?>
    </div>
  </section>
</main>

<?php

incluirTemplate('footer');
?>