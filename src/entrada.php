<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Option 1: Include in HTML -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="./output.css" />
    <title>Bienes Raices</title>
  </head>
  <body class="bg-white">
    <header class="bg-slate-700">
      <div id="menu-container" class="mx-auto flex w-10/12 justify-between p-4">
        <div id="logo-menu" class="flex flex-row lg:flex-row">
          <div>
            <a href="/"
              ><img
                src="./img/logo.svg"
                alt="Logotipo de bienes raíces"
                class="h-10"
            /></a>
            <h1 class="ml-4 hidden text-white sm:ml-0 sm:block">
              Venta de casas y departamentos de lujo
            </h1>
            <nav
              id="ocultar"
              class="translate-x-full transform opacity-0 transition-opacity transition-transform duration-500 ease-in-out"
            >
              <div
                class="ml-4 flex flex-col content-center gap-4 text-lg md:flex-row"
              >
                <a href="nosotros.html" class="menu-link-mobile">Nosotros</a>
                <a href="anuncios.html" class="menu-link-mobile">Anuncios</a>
                <a href="blog.html" class="menu-link-mobile">Blog</a>
                <a href="contacto.html" class="menu-link-mobile">Contacto</a>
              </div>
            </nav>
          </div>
        </div>
        <nav class="hidden transition-all duration-300 ease-in-out md:flex">
          <div class="ml-4 flex flex-col content-center gap-4 md:flex-row">
            <a href="nosotros.html" class="menu-link">Nosotros</a>
            <a href="anuncios.html" class="menu-link">Anuncios</a>
            <a href="blog.html" class="menu-link">Blog</a>
            <a href="contacto.html" class="menu-link">Contacto</a>
          </div>
        </nav>
        <button
          class="ml-auto h-10 w-10 rounded-sm bg-white sm:hidden"
          onclick="mostrarOcultar()"
        >
          <i class="bi bi-list"></i>
        </button>
      </div>
      <!-- barra -->
    </header>
    <main>
      <section class="mx-auto my-8 max-w-3xl px-8">
        <h1 class="mb-4 text-4xl font-bold capitalize">
          guia para decoracion de tu hogar
        </h1>
        <img src="./img/destacada2.jpg" alt="" class="mb-4 rounded-lg" />
        <p>Escrito el: 20/10/2021 por: Admin</p>
        <p class="text-gray-700">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe ullam
          nemo recusandae nisi illum reprehenderit, soluta excepturi vel
          asperiores voluptatum, sequi libero cumque, ducimus architecto
          consequuntur similique optio voluptas quos!
        </p>
      </section>
    </main>

    <footer
      class="footer seccion flex items-center justify-between bg-slate-700 px-4 py-20"
    >
      <div class="text-white">
        <nav
          class="ml-4 content-center sm:flex sm:flex-col md:flex-row md:flex-wrap md:gap-x-4"
        >
          <a href="nosotros.html" class="menu-link">Nosotros</a>
          <a href="anuncios.html" class="menu-link">Anuncios</a>
          <a href="blog.html" class="menu-link">Blog</a>
          <a href="contacto.html" class="menu-link">Contacto</a>
        </nav>
      </div>
      <p class="text-white">Derechos reservados 2024 &copy;</p>
      <script src="app.js"></script>
    </footer>
  </body>
</html>
