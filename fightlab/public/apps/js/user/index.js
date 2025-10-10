async function exportarPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const elemento = document.getElementById("listado"); 

    await html2canvas(elemento).then((canvas) => {
        const imgData = canvas.toDataURL("image/png");
        const imgProps = doc.getImageProperties(imgData);
        const pdfWidth = doc.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        doc.addImage(imgData, "PNG", 0, 0, pdfWidth, pdfHeight);
        doc.save("listado.pdf");
    });
}


document.addEventListener("DOMContentLoaded", async () => {
  const tbody = document.getElementById("tabla-usuarios");
  const inputBusqueda = document.getElementById("search-user");
  const selectRol = document.getElementById("filter-role");

  if (!tbody) return;

  let usuarios = await userService.list();

  function renderTabla(filtrados) {
    tbody.innerHTML = "";
    filtrados.forEach(u => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${u.nombres} ${u.apellido}</td>
        <td>${u.cuenta}</td>
        <td>${u.perfil}</td>
        <td>${u.correo}</td>
        <td>
          <a href="usuario/edit?id=${u.id}" class="btn btn-warning btn-sm"> <i class="bi bi-pencil"></i>  Editar</a>
        </td>
      `;
      tbody.appendChild(tr);
    });
  }

  function aplicarFiltros() {
    const texto = inputBusqueda.value.toLowerCase();
    const rol = selectRol.value;

    const filtrados = usuarios.filter(u => {
      const coincideTexto = u.nombres.toLowerCase().includes(texto) || u.apellido.toLowerCase().includes(texto);
      const coincideRol = rol === "" || u.perfil.toLowerCase() === rol.toLowerCase();
      return coincideTexto && coincideRol;
    });

    renderTabla(filtrados);
  }

  renderTabla(usuarios);

  inputBusqueda?.addEventListener("input", aplicarFiltros);
  selectRol?.addEventListener("change", aplicarFiltros);

  document.addEventListener("click", async (e) => {
    const btn = e.target.closest(".btn-eliminar-usuario");
    if (btn) {
      const id = btn.dataset.id;
      const confirmado = confirm("¿Estás seguro de que querés eliminar este usuario?");
      if (!confirmado) return;

      const ok = await userService.delete(id);
      if (ok) {
        mostrarToast("Usuario eliminado correctamente", "danger");
        usuarios = await userService.list();
        aplicarFiltros();
      } else {
        mostrarToast("No se pudo eliminar el usuario", "warning");
      }
    }
  });
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

