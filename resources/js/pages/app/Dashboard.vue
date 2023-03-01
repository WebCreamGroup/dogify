<template>
    <main class="space-y-10 h-full">
        <template v-if="pets.length">
            <section class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <button @click="addDog" :class="{ 'loading': buttonLoadingState.add }" type="button" class="btn gap-2">
                    <PlusIcon v-if="! buttonLoadingState.add" class="w-6 h-6"/>
                    Add dog
                </button>

                <Select v-model="filterByBreed" :options="breeds.map(breed => ({ key: breed.id, value: breed.name }))" placeholder="Breeds" class="sm:w-[300px]" nullable/>
            </section>

            <section v-if="pets.length" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5">
                <!--suppress JSUnusedLocalSymbols -->
                <Card v-for="pet in pets.filter(pet => filterByBreed ? pet.breed_id === filterByBreed : true)">
                    <template v-slot:title>
                        <h2 v-html="pet.name"/>
                    </template>

                    <template v-slot:default>
                        <!--suppress JSUnresolvedVariable -->
                        <p v-text="pet.breed.name"/>
                        <div class="badge badge-ghost" v-text="dayjs(pet.birth_date).format('D MMM YYYY')" />
                    </template>
                </Card>
            </section>
        </template>
        <section v-else class="flex items-center justify-center h-full">
            <Card class="w-72">
                <template v-slot:image>
                    <img src="https://images.unsplash.com/photo-1453227588063-bb302b62f50b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2670&q=80" alt="empty">
                </template>

                <template v-slot:title>
                    <div class="text-center w-full">
                        {{ $lang.get('strings.You don\'t have dog yet') }}
                    </div>
                </template>

                <template v-slot:actions>
                    <div class="w-full text-center">
                        <button @click="addDog" :class="{ 'loading': buttonLoadingState.add }" type="button" class="btn gap-2">
                            <PlusIcon v-if="! buttonLoadingState.add" class="w-6 h-6"/>
                            Add dog
                        </button>
                    </div>
                </template>
            </Card>
        </section>
    </main>
</template>

<script>
import { usePageMixin, useLangMixin } from '@/mixins'
import Select from '@/components/input/Select.vue'
import Card from '@/components/Card.vue'
import { PlusIcon } from '@heroicons/vue/20/solid'
import { useDogModal } from '@/modals/dogModal'
import dayjs from 'dayjs'

export default {
    mixins: [usePageMixin, useLangMixin],
    components: { Card, PlusIcon, Select },
    props: ['pets', 'breeds'],
    data: () => ({
        buttonLoadingState: {},
        filterByBreed: null,
    }),
    computed: {
        dayjs: () => dayjs,
    },
    methods: {
        async addDog() {
            this.buttonLoadingState.add = true
            await useDogModal()
            delete this.buttonLoadingState.add
        },
    },
}
</script>
