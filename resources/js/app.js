
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();




// resources/js/app.js
import { createApp } from 'vue';
import MyComponent from './components/MyComponent.vue';

createApp({
    components: {
        MyComponent
    },
}).mount('#app');
/*
import Vue from 'vue';
import CommentComponent from './components/CommentComponent.vue';

new Vue({
    el: '#app',
    components: {
        CommentComponent,
    },
});
-->
*/
