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
        const pages = import.meta.glob('./pages/**/*.vue')
        const page = await pages[`./pages/${name}.vue`]()
        let layout = null

        if (name.startsWith('public/') || name.startsWith('blog/')) {
            layout = (await import('./layouts/Public.vue')).default
        }

        if (name.startsWith('auth/')) {
            layout = (await import('./layouts/Auth.vue')).default
        }

        if (name.startsWith('app/')) {
            layout = (await import('./layouts/App.vue')).default
        }

        page.default.layout = (await import('./layouts/Base.vue')).default
        page.default.layout.layout = layout

        return page
    },
    setup({ el, App, props, plugin }) {
        const VueApp = createApp({ render: () => h(App, props) })

        VueApp
            .use(plugin)
            .use(createPinia())
            .mount(el)
    },
})
