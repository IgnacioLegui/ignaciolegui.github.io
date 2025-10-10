

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formularioAlta");

  if (!form) return;

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const data = {
      nombre: document.getElementById("nombre").value,
      codigo: document.getElementById("codigo").value,
      descripcion: document.getElementById("descripcion").value,
      categoriaId: document.getElementById("categoria").value, 
      precio: parseFloat(document.getElementById("precio").value),
      stock: parseInt(document.getElementById("stock").value),
    };

    const ok = await itemService.save(data);
   if (ok) {
  mostrarToast("Producto creado correctamente", "success");

  setTimeout(() => {
    window.location.href = "/lab_prog_2025_JoseIgnacio_Leguizamon/public/producto";
  }, 2000);
}

    });})

