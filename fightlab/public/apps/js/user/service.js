
const BASE_URL = "/lab_prog_2025_JoseIgnacio_Leguizamon/public/usuario";

const userService = {
  async load(id) {
    const res = await fetch(`${BASE_URL}/load/${id}`);
    const json = await res.json();
    return json.result;
  },

  async save(data) {
    const res = await fetch(`${BASE_URL}/save`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data),
    });
    return res.ok;
  },

  async list() {
    const res = await fetch(`${BASE_URL}/list`);
    const json = await res.json();
    return json.result;
  },

  async update(data) {
    return this.save(data);
  },

  async delete(id) {
    const res = await fetch(`${BASE_URL}/delete/${id}`, {
      method: "GET",
    });
    return res.ok;
  },
};

