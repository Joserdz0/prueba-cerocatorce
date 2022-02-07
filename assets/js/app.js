import Vue from 'vue';
import vuetify from '../plugins/vuetify';
import App from './views/App';
import Routes from './routes.js';
import '../css/app.css';

new Vue({
    el: '#app',
    vuetify,
    router: Routes,
    render: h => h(App)
});