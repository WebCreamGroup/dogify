import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createPinia } from 'pinia'

import '../css/app.css'

// noinspection JSUnusedGlobalSymbols,JSIgnoredPromiseFromCall
createInertiaApp({
    progress: {
        color: 'hsl(var(--p))',
    },
    resolve: async name => {
        const pages = import.meta.glob('./Pages/**/*.vue')

        return pages[`./Pages/${name}.vue`]()
    },
    setup({ el, App, props, plugin }) {
        const VueApp = createApp({ render: () => h(App, props) })

        VueApp
            .use(plugin)
            .use(createPinia())
            .mount(el)
    },
})
