<template>
    <div class="container mx-auto p-5 space-y-16 flex flex-col h-screen">
        <AppNavbar/>

        <div class="grow py-10">
            <slot/>
        </div>

        <Footer/>
    </div>
</template>

<script>
import AppNavbar from '@/components/layout/AppNavbar.vue'
import Footer from '@/components/layout/Footer.vue'

export default {
    components: { AppNavbar, Footer },
}
</script>
