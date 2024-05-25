<?php
require './includes/funciones.php';
incluirTemplate('header');
?>
<main class="mx-auto grid h-full max-w-screen-lg place-items-center gap-y-4 p-4">
  <section>
    <h1 class="mb-6 text-center text-4xl font-thin">
      Conoce sobre nosotros
    </h1>
    <div class="mb-6 grid place-items-center gap-2 md:grid-cols-2">
      <div>
        <img src="./img/nosotros.jpg" alt="Imagen de nosotros" class="h-96" />
      </div>
      <div>
        <h2 class="mb-4 text-2xl font-bold text-slate-600">
          25 años de experiencia
        </h2>
        <p class="max-w-96 text-base text-slate-700 md:max-w-lg">
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Accusamus, nostrum. Lorem ipsum dolor sit amet consectetur
          adipisicing elit. Accusamus, nostrum. Lorem ipsum dolor sit amet
          consectetur adipisicing elit. Accusamus, nostrum. Lorem ipsum
          dolor sit amet consectetur adipisicing elit. Accusamus, nostrum.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
          eligendi dolorem reprehenderit deleniti odio voluptatum
          exercitationem unde, ipsam mollitia tenetur culpa suscipit vitae
          placeat porro neque officia magnam consequuntur obcaecati. Lorem
          ipsum dolor sit amet consectetur adipisicing elit. Voluptate
          pariatur ab molestias esse laudantium. Ipsum tempora incidunt
          vitae accusamus eos ex veritatis aliquid molestias rerum saepe
          quia delectus repudiandae laboriosam culpa voluptatibus quam
          numquam id maiores, iusto ducimus recusandae illo sit unde
          quibusdam. Asperiores nam corrupti porro veniam cumque accusantium
          aut laboriosam culpa voluptatum officiis, hic, sapiente cum autem
          velit necessitatibus tenetur ad, quas architecto impedit facilis
          eos! Dignissimos reiciendis dolorum repellat, deleniti omnis
          recusandae quas nostrum perspiciatis laboriosam fugit voluptatum,
          voluptas laudantium adipisci doloribus vitae corporis, nobis quae
          facilis officia. Reiciendis, dolore assumenda. Expedita excepturi
          magni corrupti labore quia.
        </p>
      </div>
    </div>
  </section>

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

<?php

incluirTemplate('footer');
?>