// noinspection NpmUsedModulesInstalled
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import PublicLayout from './Layouts/Public.vue'

import '../css/app.css'

// noinspection JSUnusedGlobalSymbols,JSIgnoredPromiseFromCall
createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]

        if (['Landing', 'About'].includes(name)) {
            page.default.layout = PublicLayout
        }

        return page
    },
    setup({ el, App, props, plugin }) {
        const VueApp = createApp({ render: () => h(App, props) })

        VueApp.use(plugin).mount(el)
    },
})
