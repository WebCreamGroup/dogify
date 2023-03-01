<template>
    <div class="container mx-auto p-5 space-y-16 flex flex-col h-screen">
        <div class="grow">
            <div class="flex flex-col justify-center h-full">
                <div class="space-y-5">
                    <div class="text-center">
                        <Logo/>
                    </div>

                    <div class="block card max-w-sm bg-base-100 shadow-xl mx-auto self-center card-bordered card-normal">
                        <div class="card-body">
                            <slot/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Footer/>
    </div>
</template>

<script>
import Logo from '@/components/Logo.vue'
import Footer from '@/components/layout/Footer.vue'

export default {
    components: { Logo, Footer },
}
</script>
