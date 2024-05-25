<?php

declare(strict_types=1);
require './includes/app.php';
incluirTemplate('header', true);

?>

<main class="mx-auto grid h-full max-w-screen-lg place-items-center gap-y-4 p-4 text-white">
  <h1 class="text-4xl font-thin text-slate-600">Mas Sobre nosotros</h1>
  <div class="grid gap-10 bg-white p-4 sm:grid-cols-3">
    <div class="iconos-medio">
      <img src="./img/icono1.svg" alt="Icono Seguridad" loading="lazy" class="h-36" />
      <h3 class="text-3xl text-slate-600">Seguridad</h3>
      <p class="text-xl text-slate-700">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
        nostrum.
      </p>
    </div>
    <div class="iconos-medio">
      <img src="./img/icono2.svg" alt="Icono Dinero" loading="lazy" class="h-36" />
      <h3 class="text-3xl text-slate-600">Costos</h3>
      <p class="text-xl text-slate-700">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
        nostrum.
      </p>
    </div>
    <div class="iconos-medio">
      <img src="./img/icono3.svg" alt="Icono Tiempo" loading="lazy" class="h-36" />
      <h3 class="text-3xl text-slate-600">Tiempo</h3>
      <p class="text-xl text-slate-700">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
        nostrum.
      </p>
    </div>
  </div>
</main>
<div class="mx-auto w-9/12 border border-b-gray-200"></div>
<!-- EMPIEZA GRID PROPIEDADES DESTACADAS -->
<section class="p-8">
  <h2 class="my-4 text-3xl">Casas y departamentos en venta</h2>
  <!--  -->
  <div class="grid place-items-center gap-x-2 gap-y-4 lg:grid-cols-3">
    <?php
    $propiedadesLimite = 3;
    $propiedadesPlace = 'index';
    include 'includes/templates/anuncios.php';
    ?>
  </div>
</section>
<!-- TERMINA GRID PROPIEDADES DESTACADAS -->

<!-- CONTENEDOR BANNER CONTACTO -->
<div class="flex w-full max-w-full justify-center p-8 sm:justify-end">
  <a href="" class="boton-naranja-inline">Ver todas</a>
</div>
<section class="flex h-[450px] w-full flex-col items-center justify-center bg-cover bg-center" style="background-image: url(./img/encuentra.jpg)">
  <h2 class="px-8 text-center text-3xl font-bold text-white sm:text-4xl">
    Encuentra la casa de tus sueños
  </h2>
  <p class="mt-8 text-center text-sm text-white sm:text-xl">
    Llena el formulario de contacto
  </p>
  <p class="text-center text-sm text-white sm:text-xl">
    y un asesor se pondrá en contacto contigo a la brevedad
  </p>
  <button class="boton-naranja-inline mt-8">Contactanos</button>
</section>
<!-- CONTENEDOR BANNER CONTACTO -->

<!-- BLOG -->
<section class="mt-8 grid w-11/12 gap-8 px-10 md:mx-auto lg:grid-cols-12">
  <div class="lg:col-span-8">
    <h2 class="mb-4 text-2xl font-bold">Nuestro blog</h2>
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
  </div>
  <div class="mb-4 lg:col-span-4">
    <h1 class="mb-8 text-center text-3xl font-thin">Testimoniales</h1>
    <div class="flex rounded-2xl bg-[#71b100]">
      <div class="pl-8 pt-10">
        <i class="bi bi-quote text-7xl text-white"></i>
      </div>
      <div class="pr-10 pt-10">
        <p class="mb-4 text-lg text-white md:text-2xl md:leading-loose">
          El personal se comportó de una excelente forma, muy buena atención
          y la casa que me ofrecieron cumple con todas mis expectativas.
        </p>
        <p class="text-right text-xl italic leading-relaxed text-white">
          - Luis Gonzalez
        </p>
      </div>
    </div>
  </div>
</section>
<!-- BLOG -->
<?php

incluirTemplate('footer');
?>