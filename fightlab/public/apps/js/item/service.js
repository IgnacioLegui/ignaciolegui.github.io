
const itemService = {
  async load(id) {
    const res = await fetch(`/lab_prog_2025_JoseIgnacio_Leguizamon/public/producto/load/${id}`);
    const json = await res.json();
    return json.result;
  },

  async save(data) {
  const res = await fetch("/lab_prog_2025_JoseIgnacio_Leguizamon/public/producto/save", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data),
  });
  return res.ok;
},

  async list() {
    const res = await fetch(`/lab_prog_2025_JoseIgnacio_Leguizamon/public/producto/list`);
    const json = await res.json();
    return json.result;
  },

  async update(data) {
    return this.save(data);
  },

  async delete(id) {
    const res = await fetch(`/lab_prog_2025_JoseIgnacio_Leguizamon/public/producto/delete/${id}`, {
      method: "DELETE",
    });
    return res.ok;
  },
};
