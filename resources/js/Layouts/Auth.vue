<template>
    <div class="container mx-auto p-5 space-y-16 flex flex-col h-screen">
        <div class="grow">
            <div class="flex flex-col justify-center h-full">
                <div class="space-y-5">
                    <div class="text-center">
                        <Logo/>
                    </div>

                    <div class="block card max-w-sm bg-base-100 shadow-xl mx-auto self-center card-bordered card-normal">
                        <div class="card-body space-y-5">
                            <h2 v-if="store.title" class="card-title">{{ store.title }}</h2>

                            <slot/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <LayoutFooter/>
    </div>
</template>

<script>
import { Logo, LayoutFooter } from '../Components'
import { defineStore } from 'pinia'

export const useStore = defineStore('Layouts/Auth', {
    state: () => ({ title: '' }),
    actions: {
        setTitle(title) {
            this.title = title
        },
    },
})

export default {
    name: 'Layouts/Auth',
    components: { Logo, LayoutFooter },
    computed: {
        store: () => useStore(),
    },
}
</script>
