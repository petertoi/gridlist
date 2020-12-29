require('./bootstrap');

require('moment');

import Vue from 'vue';

import {InertiaApp} from '@inertiajs/inertia-vue';
import {InertiaForm} from 'laravel-jetstream';
import PortalVue from 'portal-vue';

Vue.mixin({
    methods: {
        route,
        error(field, errorBag = 'default') {
            if (!this.$page.errors.hasOwnProperty(errorBag)) {
                return null;
            }
            if (this.$page.errors[errorBag].hasOwnProperty(field)) {
                return this.$page.errors[errorBag][field][0];
            }
            return null;
        }
    }
});
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
