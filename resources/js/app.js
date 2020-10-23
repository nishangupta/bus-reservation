require("./bootstrap");

window.Vue = require("vue");

Vue.component("app-component", require("./components/ChatComponent.vue"));

const app = new Vue({
    el: "#app"
});
