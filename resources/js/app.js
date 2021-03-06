import router from "./routes"
import VueRouter from "vue-router";
import Index from "./Index.vue";
import moment from "moment";
import StarRating from "./shared/components/StarRating.vue"
require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueRouter);

Vue.filter("fromNow", value => moment(value).fromNow());
Vue.component("star-rating", StarRating);

const app = new Vue({
    el: '#app',
    router,
    components:{
        "index":Index,
    },
});
