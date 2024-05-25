<?php
require './includes/funciones.php';
incluirTemplate('header', false);
?>


<main class="alinear-elementos">
  <section class="mx-auto max-w-3xl px-8">
    <h1 class="mb-8 mt-20 text-center text-3xl">Nuestro Blog</h1>
    <div class="mb-4 flex flex-col justify-center gap-4 sm:flex-row">
      <div class="">
        <img src="./img/blog1.jpg" alt="Imagen del blog 1" class="mx-auto max-w-80 rounded-lg" />
      </div>
      <div>
        <h2 class="mb-4 text-2xl font-bold tracking-wide">
          Terraza en el techo de tu casa
        </h2>
        <div class="mb-2 mr-auto h-2 w-4/12 bg-orange-500"></div>
        <p class="mb-4 text-xl">
          Escrito el: <span class="text-orange-500">20/10/2021</span> por:
          <span class="text-orange-500">Admin</span>
        </p>
        <p class="mb-4 text-xl leading-relaxed tracking-wide">
          Consejos para construir una terraza en el techo de tu casa con los
          mejores materiales y ahorrando dinero
        </p>
      </div>
    </div>
    <div class="mb-4 flex flex-col gap-4 sm:flex-row">
      <div>
        <img src="./img/blog2.jpg" alt="Imagen del blog 1" class="mx-auto max-w-80 rounded-lg" />
      </div>
      <div>
        <h2 class="mb-4 text-2xl font-bold tracking-wide">
          Guía para la decoración de tu hogar
        </h2>
        <div class="mb-2 mr-auto h-2 w-4/12 bg-orange-500"></div>

        <p class="mb-4 text-xl">
          Escrito el: <span class="text-orange-500">20/10/2021</span> por:
          <span class="text-orange-500">Admin</span>
        </p>
        <p class="mb-4 text-xl leading-relaxed tracking-wide">
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar
          muebles y colores para darle vida a tu espacio
        </p>
      </div>
    </div>
    <div class="mb-4 flex flex-col justify-center gap-4 sm:flex-row">
      <div class="">
        <img src="./img/blog3.jpg" alt="Imagen del blog 1" class="mx-auto max-w-80 rounded-lg" />
      </div>
      <div>
        <h2 class="mb-4 text-2xl font-bold tracking-wide">
          Terraza en el techo de tu casa
        </h2>
        <div class="mb-2 mr-auto h-2 w-4/12 bg-orange-500"></div>
        <p class="mb-4 text-xl">
          Escrito el: <span class="text-orange-500">20/10/2021</span> por:
          <span class="text-orange-500">Admin</span>
        </p>
        <p class="mb-4 text-xl leading-relaxed tracking-wide">
          Consejos para construir una terraza en el techo de tu casa con los
          mejores materiales y ahorrando dinero
        </p>
      </div>
    </div>
    <div class="mb-4 flex flex-col justify-center gap-4 sm:flex-row">
      <div class="">
        <img src="./img/blog4.jpg" alt="Imagen del blog 1" class="mx-auto max-w-80 rounded-lg" />
      </div>
      <div>
        <h2 class="mb-4 text-2xl font-bold tracking-wide">
          Terraza en el techo de tu casa
        </h2>
        <div class="mb-2 mr-auto h-2 w-4/12 bg-orange-500"></div>
        <p class="mb-4 text-xl">
          Escrito el: <span class="text-orange-500">20/10/2021</span> por:
          <span class="text-orange-500">Admin</span>
        </p>
        <p class="mb-4 text-xl leading-relaxed tracking-wide">
          Consejos para construir una terraza en el techo de tu casa con los
          mejores materiales y ahorrando dinero
        </p>
      </div>
    </div>
  </section>
</main>
<?php

incluirTemplate('footer');
?>