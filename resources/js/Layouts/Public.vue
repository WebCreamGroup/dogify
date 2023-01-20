<template>
    <div class="container mx-auto p-5 space-y-16 flex flex-col h-screen">
        <LandingLayoutNavbar/>

        <div class="grow">
            <slot/>
        </div>

        <LayoutFooter/>
    </div>
</template>

<script>
import LandingLayoutNavbar from '../Components/LandingLayoutNavbar.vue'
import LayoutFooter from '../Components/LayoutFooter.vue'

export default {
    name: 'Layouts/Public',
    components: {
        LandingLayoutNavbar,
        LayoutFooter,
    },
}
</script>
