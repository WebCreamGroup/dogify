<template>
    <div class="container mx-auto p-5 space-y-16 flex flex-col h-screen">
        <AppNavbar/>

        <div class="grow">
            <slot/>
        </div>

        <Footer/>
    </div>
</template>

<script>
import AppNavbar from '../Components/Layout/AppNavbar.vue'
import Footer from '../Components/Layout/Footer.vue'

export default {
    components: { AppNavbar, Footer },
}
</script>
