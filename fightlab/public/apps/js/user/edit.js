
 document.addEventListener("DOMContentLoaded", async () => {
  const params = new URLSearchParams(window.location.search);
  const id = params.get("id");

  if (id) {
    await userController.load(id);
  }

  const form = document.getElementById("formularioEdicion");
  const btnEditar = document.getElementById("btnEditar");

  if (btnEditar) {
    btnEditar.addEventListener("click", () => {
      userController.enableForm(true);
    });
  }

  if (form) {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const usuario = {
        id: parseInt(document.getElementById("id").value),
        nombres: document.getElementById("nombres").value,
        apellido: document.getElementById("apellido").value,
        cuenta: document.getElementById("cuenta").value,
        correo: document.getElementById("correo").value,
        perfil: document.getElementById("perfil").value,
        clave: document.getElementById("clave").value,
        estado: document.getElementById("estado").value,
        resetPass: 0,
        fechaAlta: document.getElementById("fechaAlta")?.value || null,
      };

      if (usuario.perfil === "") {
        mostrarToast("Por favor, seleccioná un perfil", "warning");
        return;
      }

      const ok = await userService.save(usuario);
      if (ok) {
        mostrarToast("Usuario actualizado correctamente", "success");
        setTimeout(() => {
          window.location.href = "/lab_prog_2025_JoseIgnacio_Leguizamon/public/usuario";
        }, 2000);
      } else {
        mostrarToast("Error al actualizar el usuario", "danger");
      }
    });
  }

  const btnEliminar = document.getElementById("btnEliminar");

  if (btnEliminar) {
    btnEliminar.addEventListener("click", async () => {
      const confirmado = confirm("¿Estás seguro de que querés eliminar este usuario?");
      if (!confirmado) return;

      const ok = await userService.delete(id);
      if (ok) {
        mostrarToast("Usuario eliminado correctamente", "danger");
        setTimeout(() => {
          window.location.href = "/lab_prog_2025_JoseIgnacio_Leguizamon/public/usuario";
        }, 2000);
      } else {
        mostrarToast("No se pudo eliminar el usuario", "warning");
      }
    });
  }
});

function mostrarToast(mensaje, tipo = "success") {
  const toast = document.getElementById("toastSistema");
  const toastMensaje = document.getElementById("toastMensaje");

  if (toast && toastMensaje) {
    toast.className = `toast align-items-center text-bg-${tipo} border-0`;
    toastMensaje.textContent = mensaje;
    new bootstrap.Toast(toast).show();
  }
}
