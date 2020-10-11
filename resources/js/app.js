/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require("vue-awesome-notifications/dist/styles/style.css");

import { app, plugin } from '@inertiajs/inertia-vue';
import Vue from 'vue';
import VueAWN from "vue-awesome-notifications";
import { InertiaProgress } from '@inertiajs/progress';

InertiaProgress.init();

Vue.use(plugin)
Vue.use(VueAWN, {
    position: "bottom-left",
    labels: {
        success: "Sucesso",
        alert: "Atenção",
        warning: "Atenção",
        info: "Informação",
        confirm: "Necessária a confirmação",
        confirmOk: "Aceito",
        confirmCancel: "Cancelar",
    },
    messages: {
        "async-block": "Carregando",
    },
})

const el = document.getElementById('app')

new Vue({
  render: h => h(app, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(el)
