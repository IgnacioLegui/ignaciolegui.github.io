
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
  const tbody = document.getElementById("tabla-items");
  const inputBusqueda = document.getElementById("search-user");
  const selectCategoria = document.getElementById("filter-role");

  if (!tbody) return;

  let productos = await itemService.list();

  function renderTabla(filtrados) {
    tbody.innerHTML = "";
    filtrados.forEach(p => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${p.nombre}</td>
        <td>${p.codigo}</td>
        <td>${p.categoriaId}</td>
        <td>${p.precio}</td>
        <td>${p.stock}</td>
        <td>
          <a href="producto/edit?id=${p.id}" class="btn btn-warning btn-sm"> <i class="bi bi-pencil"></i>  Editar</a>
        </td>
      `;
      tbody.appendChild(tr);
    });
  }

  function aplicarFiltros() {
    const texto = inputBusqueda.value.toLowerCase();
    const categoria = selectCategoria.value;

    const filtrados = productos.filter(p => {
      const coincideTexto = p.nombre.toLowerCase().includes(texto);
      const coincideCategoria = categoria === "" || p.categoriaId.toString() === categoria;
      return coincideTexto && coincideCategoria;
    });

    renderTabla(filtrados);
  }

  
  renderTabla(productos);

  
  inputBusqueda.addEventListener("input", aplicarFiltros);
  selectCategoria.addEventListener("change", aplicarFiltros);


});

