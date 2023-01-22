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
        const page = await pages[`./Pages/${name}.vue`]()
        let layout = null

        if (name.startsWith('Public/') || name.startsWith('Blog/')) {
            layout = (await import('./Layouts/Public.vue')).default
        }

        if (name.startsWith('Auth/')) {
            layout = (await import('./Layouts/Auth.vue')).default
        }

        if (name.startsWith('App/')) {
            layout = (await import('./Layouts/App.vue')).default
        }

        page.default.layout = (await import('./Layouts/Base.vue')).default
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
