// public/app/js/user/controller.js
const userController = (function () {

  function getFormData() {
    return {
      id: document.querySelector("#id")?.value || crypto.randomUUID(),
      nombres: document.querySelector("#nombres").value,
      apellido: document.querySelector("#apellido").value,
      cuenta: document.querySelector("#cuenta").value,
      perfil: document.querySelector("#perfil").value,
      correo: document.querySelector("#correo").value,
      clave: document.querySelector("#clave").value,
      confirmarClave: document.querySelector("#confirmarClave").value
    };
  }

function fillForm(user) {
  const set = (id, value) => {
    const el = document.querySelector(`#${id}`);
    if (el) el.value = value;
  };

  set("id", user.id);
  set("nombres", user.nombres);
  set("apellido", user.apellido);
  set("cuenta", user.cuenta);
  set("perfil", user.perfil);
  set("correo", user.correo);
  set("clave", user.clave);
  set("confirmarClave", user.confirmarClave);
}

return {

  load: async function(id) {
  const user = await userService.load(id); 
  if (user) {
    fillForm(user);
    this.enableForm(false);
  }
},

  save() {
    const user = getFormData();
    userService.save(user);
    this.resetForm();
  },

  update() {
    const user = getFormData();
    userService.update(user);
    this.enableForm(false);
  },

  delete(id) {
    userService.delete(id);
  },

  list() {
  const usuarios = userService.list();
  const tbody = document.querySelector("#tabla-usuarios");
  tbody.innerHTML = "";

    usuarios.forEach(user => {
    const fila = document.createElement("tr");
    fila.innerHTML = `
      <td>${user.nombres} ${user.apellido}</td>
      <td>${user.cuenta}</td>
      <td>${user.perfil}</td>
      <td>${user.correo}</td>
      <td class="text-center">
        <div class="d-flex gap-2 justify-content-center">
          <a href="usuario/edit" id=${user.id}" class="btn btn-warning btn-sm">
          <i class="bi bi-pencil"></i>
            Editar
          </a>
          <button class="btn btn-sm btn-danger btn-eliminar-usuario" data-id="${user.id}">
            <i class="bi bi-trash3"></i>
            Eliminar
        </button>
        </div>
      </td>
    `;
    tbody.appendChild(fila);
  });
},

  exportToPDF() {
    window.print();
  },

  resetForm() {
    const form = document.querySelector("form");
    if (form) form.reset();
  },

  enableForm(state) {
    document.querySelectorAll("#formularioEdicion input, #formularioEdicion select").forEach(ctrl => {
       ctrl.disabled = !state;
    });
    document.getElementById("btnEditar").disabled = false;
    document.getElementById("btnEliminar").disabled = false;
    document.getElementById("btnExportarPDF").disabled = false;
    document.querySelector("button[type='submit']").disabled = !state;
    document.getElementById("btnCancelar").disabled = !state;
  }
};

})();