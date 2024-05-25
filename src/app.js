function mostrarOcultar() {
  const menu = document.getElementById("ocultar");

  if (menu.classList.contains("translate-x-0")) {
    menu.classList.remove("translate-x-0", "opacity-100");
    menu.classList.add("translate-x-full", "opacity-0");
  } else {
    menu.classList.remove("translate-x-full", "opacity-0");
    menu.classList.add("translate-x-0", "opacity-100");
  }
}
window.addEventListener("resize", function () {
  const menu = document.getElementById("ocultar");

  if (window.innerWidth > 768) {
    // Ajusta este valor al punto de interrupción que desees
    if (menu.classList.contains("translate-x-0")) {
      menu.classList.remove("translate-x-0", "opacity-100");
      menu.classList.add("translate-x-full", "opacity-0");
    }
  }
});
