<template>
  <v-container>
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
                  <v-icon class="icono" title="Editar" v-on:click="editar"
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
  </v-container>
</template>

<script>
export default {
  name: "App",
  props: {},
  data: () => ({
    datos: { 0: { id: "0", name: "jose", lastname: "rodriguez", age: "16" } , 1: { id: "0", name: "jose", lastname: "rodriguez", age: "16" } },
  }),
  methods: {
    editar: function () {
      alert("Hola");
    },
    eliminar: function (item) {
      console.log(item);
    },
  },
};
</script>
<style scoped>
* {
  text-align: center;
}
.icono {
  margin: 0px 10px;
}
.icono:hover {
  color: rgb(99, 99, 99);
}
</style>