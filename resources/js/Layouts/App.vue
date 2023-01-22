<template>
    <div>
        <Transition name="fade" mode="out-in">
            <div v-if="auth.user" class="container mx-auto p-5 space-y-16 flex flex-col h-screen">
                <AppNavbar/>

                <div class="grow">
                    <slot/>
                </div>

                <Footer/>
            </div>
        </Transition>
    </div>
</template>

<script>
import { usePage } from '@inertiajs/vue3'
import AppNavbar from '../Components/Layout/AppNavbar.vue'
import Footer from '../Components/Layout/Footer.vue'

export default {
    components: { AppNavbar, Footer },
    computed: {
        auth: () => usePage().props.auth,
    }
}
</script>
