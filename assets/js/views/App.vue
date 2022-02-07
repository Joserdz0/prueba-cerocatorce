<template>
  <v-app>
    <!-- Inicia Navegador -->

    <v-app-bar color="" app relative dark height="70">
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"
        ><v-icon class="material-icons-outlined"
          >menu</v-icon
        ></v-app-bar-nav-icon
      >

      <v-toolbar-title>Prueba cerocatorce</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-filter</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" absolute temporary>
      <v-list nav dense>
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
          <router-link class="text-decoration-none" to="/">
            <v-list-item >
              <v-list-item-title class="letra"> Inicio</v-list-item-title>
            </v-list-item>
          </router-link>
          <router-link class="text-decoration-none" to="/form">
            <v-list-item>
              <v-list-item-title class="letra">Registro</v-list-item-title>
            </v-list-item>
          </router-link>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

    <!-- Termina Navegador -->
    <v-main>
      <v-container>
        <router-view> </router-view>
      </v-container>
    </v-main>
  </v-app>
</template>
<script>
export default {
  name: "App",
  data: () => ({
    drawer: false,
    group: null,
  }),

  watch: {
    group() {
      this.drawer = false;
    },
  },
};
</script>
<style scoped>
.letra{
  font-size: 15px!important;
}
</style>