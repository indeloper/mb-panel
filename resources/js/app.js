import './bootstrap';
import '../css/app.css';

import { i18nVue } from 'laravel-vue-i18n'
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import routeHelper from "@/helpers/routeHelper.js";
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

const myMixin = {
    methods: {
        hello() {
            console.log('привет из примеси!')
        }
    }
}

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    mixins: [myMixin],
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(i18nVue, {
                resolve: async lang => {
                    const langs = import.meta.glob('../../lang/*.json');
                    return await langs[`../../lang/${lang}.json`]();
                }
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
