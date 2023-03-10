import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from "@inertiajs/progress"
import Layout from "./Shared/Layout.vue";
import {Head} from "@inertiajs/inertia-vue3";

InertiaProgress.init()

createInertiaApp({
    resolve: async name => {
        let page = (await import(`./Pages/${name}`)).default;

        if(page.layout === undefined){
            page.layout = Layout
        }


        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Head", Head)
            .mount(el)
    },

    title: title => 'My app - ' + title
});
