document.addEventListener("DOMContentLoaded", async () => {
  try {
    const res = await fetch("/lab_prog_2025_JoseIgnacio_Leguizamon/public/usuario/profileData");
    const data = await res.json();

    if (!res.ok) {
      console.error("Error al obtener datos:", data.message);
      return;
    }

    const user = data.result;
    if (!user) return;

    document.getElementById("nombreUsuario").textContent = user.nombres;
    document.getElementById("apellidoUsuario").textContent = user.apellido;
    document.getElementById("cuentaUsuario").textContent = user.cuenta;
    document.getElementById("correoUsuario").textContent = user.correo;
    document.getElementById("perfilUsuario").textContent = user.perfil;

  } catch (err) {
    console.error("Fallo al cargar datos del usuario:", err);
  }
});

