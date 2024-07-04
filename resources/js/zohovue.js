window.Vue = require('vue');

import ZohoComponent from './components/ZohoComponent.vue'; //!!!

const app = new Vue({
    el: '.form_block',
    components: { ZohoComponent },
    template: '<ZohoComponent />' 
});
