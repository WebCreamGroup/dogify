<template>
    <ModalBox class="w-1/2">
        <template v-slot:title>
            {{ $lang.get('strings.Dog') }}
        </template>

        <template v-slot:default>
            <form @submit.prevent="submit" :id="formId" class="space-y-5">
                <div v-if="Object.keys(form.errors || {}).length" class="alert alert-error shadow-lg">
                    <div class="items-start">
                        <div>
                            <div v-for="(error, field) in form.errors || {}" :key="field" v-text="error"/>
                        </div>
                    </div>
                </div>

                <input
                    v-model="form.name"
                    ref="autofocus"
                    type="text"
                    placeholder="Dog name"
                    class="input input-bordered w-full"
                    required
                />

                <SelectInput v-model="form.breed_id" :options="breeds.map(breed => ({ key: breed.id, value: breed.name }))" placeholder="Breed" />

                <VueTailwindDatepicker
                    v-model="form.birth_date"
                    :formatter="{ date: 'YYYY-MMM-DD', month: 'MMM' }"
                    input-classes="input input-bordered w-full"
                    as-single
                />
            </form>
        </template>

        <template v-slot:actions>
            <button :class="{ 'loading': form.processing }" :form="formId" type="submit" class="btn btn-primary">Save</button>
            <button @click="$emit('closeModal')" type="button" class="btn btn-accent">Cancel</button>
        </template>
    </ModalBox>
</template>

<script>
import ModalBox from '../components/modal/Box.vue'
import SelectInput from '../components/input/Select.vue'
import { useLangMixin } from '../mixins/lang'
import { useRouteMixin } from '../mixins/route'
import { useToastStore, TYPE as ToastType } from '../stores/toast'
import { useModalStore } from '../stores/modal'
import { useForm } from '@inertiajs/vue3'
import VueTailwindDatepicker from 'vue-tailwind-datepicker'
import { v4 as uuid } from 'uuid'
import { promiseTimeout } from '@vueuse/core'

// noinspection SpellCheckingInspection,JSUnresolvedVariable
export default {
    mixins: [useLangMixin, useRouteMixin],
    components: {
        SelectInput,
        ModalBox,
        VueTailwindDatepicker,
    },
    props: {
        pet_id: Number,
        breeds: { type: Array, required: true },
    },
    computed: {
        formId: () => uuid(),
    },
    data: () => ({
        form: useForm({ animal: 'dog', breed_id: null, name: '', birth_date: '' }),
    }),
    mounted() {
        this.autofocus()
    },
    methods: {
        autofocus() {
            if (this.pet_id) {
                return
            }

            this.$refs.autofocus.focus()
        },
        async submit() {
            this.form.processing = true
            await promiseTimeout(250)

            // noinspection JSUnresolvedVariable
            this.form.post(this.$route('pets.store'), {
                onSuccess: () => {
                    useModalStore().removeLast()
                    useToastStore().push('Pet added', ToastType.SUCCESS)
                }
            })
        },
    },
}
</script>
