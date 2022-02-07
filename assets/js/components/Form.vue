<template>
  <v-row>
    <v-col cols="12" style="padding-top: 50px">
        <p>Hola</p>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: "Form",
  props: {},
  data: () => ({
    datos: {},
    url: "http://127.0.0.1:8000/usuario",
  })
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