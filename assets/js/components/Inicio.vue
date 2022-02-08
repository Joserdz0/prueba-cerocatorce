<template>
  <v-row>
    <v-col cols="12" style="padding-top: 50px">
      <v-simple-table dark>
        <template v-slot:default>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Edad</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in datos" :key="item.name">
              <td>{{ item.name }}</td>
              <td>{{ item.lastname }}</td>
              <td>{{ item.age }}</td>
              <td>
                <v-icon class="icono" title="Editar" v-on:click="editar(item)"
                  >edit</v-icon
                >
                <v-icon
                  class="icono"
                  title="Eliminar"
                  v-on:click="eliminar(item)"
                  >delete</v-icon
                >
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: "Inicio",
  props: {},
  data: () => ({
    datos: {},
    url: "http://127.0.0.1:8000/usuario",
    urlOriginal: "http://127.0.0.1:8000/",
  }),
  methods: {
    editar: function (item) {
      window.location.href = this.urlOriginal+"form/editar/"+item.id;
    },
    eliminar: function (item) {
      async function postData(url = "", data = {}) {
        // Opciones por defecto estan marcadas con un *
        const response = await fetch(url + "/" + data, {
          method: "PUT", // *GET, POST, PUT, DELETE, etc.
          mode: "cors", // no-cors, *cors, same-origin
          cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
          credentials: "same-origin", // include, *same-origin, omit
          headers: {
            "Content-Type": "application/json; charset=utf-8",
            // 'Content-Type': 'application/x-www-form-urlencoded',
          },
          redirect: "follow", // manual, *follow, error
          referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
          body: JSON.stringify("Enviando PUT"), // body data type must match "Content-Type" header
        });
        return response.json(); // parses JSON response into native JavaScript objects
      }
      postData(this.url, item.id).then((data) => {
        this.leer();
      });
    },
    leer: function () {
      fetch(this.url)
        .then((response) => response.json())
        .then((data) => (this.datos = data));
    },
  },
  mounted() {
    this.leer();
  },
};
</script>
<style scoped>
* {
  text-align: center!important;
}
.icono {
  margin: 0px 10px;
}
.icono:hover {
  color: rgb(99, 99, 99);
}
</style>