<?php
require './includes/funciones.php';
incluirTemplate('header', false);
?>
<main>
  <div class="alinear-elementos my-8">
    <h1 class="my-4 text-center text-4xl font-thin">Contacto</h1>
    <img src="./img/destacada3.jpg" alt="" />
  </div>
  <div class="alinear-elementos my-8">
    <h1 class="my-4 text-center text-4xl font-thin">
      Llene el formulario de contacto
    </h1>
    <form class="mx-auto max-w-md">
      <fieldset class="mb-4">
        <legend class="text-lg font-semibold">Información Personal</legend>

        <div class="mb-4">
          <label for="nombre" class="block">Nombre</label>
          <input type="text" placeholder="Tu Nombre" id="nombre" class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" />
        </div>

        <div class="mb-4">
          <label for="email" class="block">E-mail</label>
          <input type="email" placeholder="Tu Email" id="email" class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" />
        </div>

        <div class="mb-4">
          <label for="telefono" class="block">Teléfono</label>
          <input type="tel" placeholder="Tu Teléfono" id="telefono" class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" />
        </div>

        <div class="mb-4">
          <label for="mensaje" class="block">Mensaje:</label>
          <textarea id="mensaje" class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500"></textarea>
        </div>
      </fieldset>

      <fieldset class="mb-4">
        <legend class="text-lg font-semibold">
          Información sobre la propiedad
        </legend>

        <div class="mb-4">
          <label for="opciones" class="block">Vende o Compra:</label>
          <select id="opciones" class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500">
            <option value="" disabled selected>-- Seleccione --</option>
            <option value="Compra">Compra</option>
            <option value="Vende">Vende</option>
          </select>
        </div>

        <div class="mb-4">
          <label for="presupuesto" class="block">Precio o Presupuesto</label>
          <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" />
        </div>
      </fieldset>

      <fieldset class="mb-4">
        <legend class="text-lg font-semibold">
          Información sobre la propiedad
        </legend>

        <p class="mb-2">Como desea ser contactado</p>

        <div class="mb-4">
          <label for="contactar-telefono" class="mr-2 inline-block">Teléfono</label>
          <input name="contacto" type="radio" value="telefono" id="contactar-telefono" class="mr-2" />

          <label for="contactar-email" class="inline-block">E-mail</label>
          <input name="contacto" type="radio" value="email" id="contactar-email" class="ml-2" />
        </div>

        <p class="mb-2">Si eligió teléfono, elija la fecha y la hora</p>

        <div class="mb-4">
          <label for="fecha" class="block">Fecha:</label>
          <input type="date" id="fecha" class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" />
        </div>

        <div class="mb-4">
          <label for="hora" class="block">Hora:</label>
          <input type="time" id="hora" min="09:00" max="18:00" class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" />
        </div>
      </fieldset>

      <input type="submit" value="Enviar" class="w-full rounded-md bg-green-500 px-4 py-2 text-white hover:bg-green-600" />
    </form>
  </div>
</main>
<?php

incluirTemplate('footer');
?>