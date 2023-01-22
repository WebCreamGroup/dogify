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
import { LandingNavbar, Footer } from '../Components/Layout'

export default {
    components: {
        LandingNavbar,
        Footer,
    },
}
</script>
