<template>
    <div class="container mx-auto p-5 space-y-16 flex flex-col h-screen">
        <LandingNavbar/>

        <div class="grow">
            <slot/>
        </div>

        <Footer/>
    </div>
</template>

<script>
import LandingNavbar from '../components/layout/LandingNavbar.vue'
import Footer from '../components/layout/Footer.vue'

export default {
    components: { LandingNavbar, Footer },
}
</script>
