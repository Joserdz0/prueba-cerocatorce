import Vue from 'vue';
import vuetify from '../plugins/vuetify'
import App from './components/App';
import '../css/app.css';

new Vue({
    el: '#app',
    vuetify,
    render: h => h(App)
});