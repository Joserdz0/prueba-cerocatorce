<template>
  <v-row>
    <v-col cols="12" md="4" offset-md="4" style="padding-top: 50px">
      <v-card elevation="10">
        <v-form v-model="valid">
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field
                  v-model="name"
                  :rules="nameRules"
                  :counter="50"
                  label="Nombre"
                  required
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-text-field
                  v-model="lastname"
                  :rules="lastnameRules"
                  :counter="50"
                  label="Apellido"
                  required
                ></v-text-field>
              </v-col>

              <v-col cols="3">
                <v-text-field
                  v-model="age"
                  :rules="ageRules"
                  label="Edad"
                  required
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-btn
                  class="mr-4 float-right"
                  :disabled="!valid"
                  @click.stop="multiFuncion"
                >
                  {{ urlActual == "/form" ? "Registrar" : "Editar" }}
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </v-form>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: "Form",
  props: {},
  data: () => ({
    id: "",
    urlActual: window.location.pathname,
    url: "http://127.0.0.1:8000/",
    valid: false,
    name: "",
    lastname: "",
    age: "",
    nameRules: [
      (v) => !!v || "El nombre es requerido",
      (v) => v.length <= 50 || "Name must be less than 10 characters",
    ],
    lastnameRules: [
      (v) => !!v || "El apellido es requerido",
      (v) => v.length <= 50 || "Name must be less than 10 characters",
    ],
    ageRules: [
      (v) => !!v || "La edad es requerida",
      (v) => v < 125 || "Debe ser una edad real",
    ],
  }),
  methods: {
    multiFuncion: function () {
      if (this.urlActual == "/form") {
        this.registrar();
      } else {
        this.editar();
      }
    },
    obtenerID: function () {
      let urlSeparado = this.urlActual.split("/");
      this.id = urlSeparado[urlSeparado.length - 1];
    },

    redireccionar: function () {
      window.location.href = this.url;
    },
    registrar: function () {
      async function postData(url = "", data = {}) {
        // Opciones por defecto estan marcadas con un *
        const response = await fetch(url + "usuario/", {
          method: "POST", // *GET, POST, PUT, DELETE, etc.
          mode: "cors", // no-cors, *cors, same-origin
          cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
          credentials: "same-origin", // include, *same-origin, omit
          headers: {
            "Content-Type": "application/json; charset=utf-8",
            // 'Content-Type': 'application/x-www-form-urlencoded',
          },
          redirect: "follow", // manual, *follow, error
          referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
          body: JSON.stringify(data), // body data type must match "Content-Type" header
        });
        return response.json(); // parses JSON response into native JavaScript objects
      }
      postData(this.url, {
        name: this.name,
        lastname: this.lastname,
        age: this.age,
      }).then((data) => {});
      this.redireccionar();
    },
    traerDatos: function () {
      this.obtenerID();

      fetch(this.url + "usuario/" + this.id)
        .then((response) => response.json())
        .then((data) => {
          this.name = data.name;
          this.lastname = data.lastname;
          this.age = data.age;
        });
    },
    editar: function (item) {
      async function postData(url = "", id, name, lastname, age) {
        // Opciones por defecto estan marcadas con un *
        const response = await fetch(
          url + "usuario/" + id + "/" + name + "/" + lastname + "/" + age,
          {
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
          }
        );
        return response.json(); // parses JSON response into native JavaScript objects
      }
      postData(this.url, this.id, this.name, this.lastname, this.age).then((data) => {this.redireccionar()});

    },
  },
  mounted() {
    if (this.urlActual == "/form") {
    } else {
      this.traerDatos();
    }
  },
};
</script>
<style scoped>
</style>