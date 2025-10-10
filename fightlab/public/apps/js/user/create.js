document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formularioRegistro");

  if (form) {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const usuario = {
        nombres: document.getElementById("nombres").value,
        apellido: document.getElementById("apellido").value,
        cuenta: document.getElementById("cuenta").value,
        correo: document.getElementById("correo").value,
        perfil: document.getElementById("perfil").value,
        clave: document.getElementById("clave").value,
        estado: 1,
        fechaAlta: new Date().toISOString().slice(0, 10), // "YYYY-MM-DD"
        resetPass: 0
      };

      if (usuario.perfil === "") {
        mostrarToast("Por favor, seleccioná un perfil", "warning");
        return;
      }

      const ok = await userService.save(usuario);
      if (ok) {
        mostrarToast("Usuario creado correctamente", "success");
        setTimeout(() => {
          window.location.href = "/lab_prog_2025_JoseIgnacio_Leguizamon/public/usuario";
        }, 2000);
      } else {
        mostrarToast("Error al crear el usuario", "danger");
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
