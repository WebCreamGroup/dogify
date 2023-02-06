<template>
    <main class="space-y-10 h-full">
        <template v-if="pets.length">
            <section>
                Toolbar
            </section>

            <section v-if="pets.length">
                <Card v-for="pet in pets">
                    {{ pet }}
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
                        <button type="button" class="btn gap-2">
                            <PlusIcon class="w-6 h-6"/>
                            Add dog
                        </button>
                    </div>
                </template>
            </Card>
        </section>
    </main>
</template>

<script>
import { usePageMixin } from '../../mixins/page'
import { useLangMixin } from '../../mixins/lang'
import Card from '../../components/Card.vue'
import { PlusIcon } from '@heroicons/vue/20/solid'

export default {
    mixins: [usePageMixin, useLangMixin],
    components: { Card, PlusIcon },
    props: ['pets'],
}
</script>
