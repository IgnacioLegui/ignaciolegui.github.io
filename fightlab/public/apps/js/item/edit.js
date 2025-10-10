
document.addEventListener("DOMContentLoaded", async () => {
  const params = new URLSearchParams(window.location.search);
  const id = params.get("id");

  if (id) await itemController.load(id);

  const form = document.getElementById("formularioEdicion");
  const btnEditar = document.getElementById("btnEditar");

  if (btnEditar) {
    btnEditar.addEventListener("click", () => {
      itemController.enableForm(true); 
    });
  }

  if (form) {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const item = {
        id: parseInt(document.getElementById("id").value),
        nombre: document.getElementById("nombre").value,
        codigo: document.getElementById("codigo").value,
        descripcion: document.getElementById("descripcion").value,
        categoriaId: document.getElementById("categoria").value,
        precio: document.getElementById("precio").value,
        stock: document.getElementById("stock").value,
      };

      // Validación extra
      if (item.categoriaId === "") {
        alert("Por favor, seleccioná una categoría.");
        return;
      }

      const ok = await itemService.save(item);
      if (ok) {
        mostrarToast("Producto actualizado correctamente", "success");

        setTimeout(() => {
        window.location.href = "/lab_prog_2025_JoseIgnacio_Leguizamon/public/producto";
  }, 2000);
}

    });
  }
  const btnEliminar = document.getElementById("btnEliminar");

if (btnEliminar) {
  btnEliminar.addEventListener("click", async () => {
    const confirmado = confirm("¿Estás seguro de que querés eliminar este producto?");
    if (!confirmado) return;

    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");

    try {
      const res = await fetch(`/lab_prog_2025_JoseIgnacio_Leguizamon/public/producto/delete/${id}`, {
        method: "GET", // o POST si volvés a usarlo así
      });

      const data = await res.json();

      if (res.ok) {
        mostrarToast(data.message || "Producto eliminado correctamente", "danger");

        setTimeout(() => {
          window.location.href = "/lab_prog_2025_JoseIgnacio_Leguizamon/public/producto";
        }, 2000);
      } else {
        mostrarToast(data.message || "No se pudo eliminar el producto", "warning");
      }
    } catch (error) {
      mostrarToast("Error de red al eliminar el producto", "danger");
      console.error(error);
    }
  });
}

})
