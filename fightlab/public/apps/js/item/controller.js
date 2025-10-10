
const itemController = {
  async list() {
    const lista = await itemService.list();
    const tbody = document.getElementById("tabla-items");

    if (!tbody) return; 

    tbody.innerHTML = "";
    lista.forEach(item => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${item.id}</td>
        <td>${item.nombre}</td>
        <td>${item.codigo}</td>
        <td>${item.categoriaId}</td>
        <td>${item.precio}</td>
        <td>${item.stock}</td>
        <td>
          <a href="/lab_prog_2025_JoseIgnacio_Leguizamon/public/producto/edit?id=${item.id}" class="btn btn-warning btn-sm">Editar</a>
        </td>
      `;
      tbody.appendChild(tr);
    });
  },

  async load(id) {
    const item = await itemService.load(id);
    if (item) {
      fillForm(item);
      this.enableForm?.(false);
    }
  },

  enableForm(enable) {
    document.querySelectorAll("input, select, textarea").forEach(el => {
      el.disabled = !enable;
    });
  }
};

function fillForm(item) {
  document.getElementById("id").value = item.id;
  document.getElementById("nombre").value = item.nombre;
  document.getElementById("codigo").value = item.codigo;
  document.getElementById("descripcion").value = item.descripcion;
  document.getElementById("categoria").value = item.categoriaId;
  document.getElementById("precio").value = item.precio;
  document.getElementById("stock").value = item.stock;
}
