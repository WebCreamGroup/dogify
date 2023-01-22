<script setup>
import { router } from '@inertiajs/vue3'
import { shallowRef, ref, watch } from 'vue'
import Toast from '../Components/Layout/Toast.vue'

const layout = shallowRef(null)
const name = ref(router?.page.component)

// noinspection JSCheckFunctionSignatures
router.on('navigate', ({ detail }) => name.value = detail.page.component)

watch(name, async (value) => {
    if (value.startsWith('Public/') || value.startsWith('Blog/')) {
        layout.value = (await import('./Public.vue')).default
    }

    if (value.startsWith('Auth/')) {
        layout.value = (await import('./Auth.vue')).default
    }

    if (value.startsWith('App/')) {
        layout.value = (await import('./App.vue')).default
    }
}, { immediate: true })
</script>

<template>
    <Transition name="fade" mode="out-in">
        <Component :is="layout">
            <Transition name="fade" mode="out-in">
                <slot/>
            </Transition>
        </Component>
    </Transition>

    <Toast/>
</template>
