<template>
    <div class="space-y-5">
        <form @submit.prevent="submit" class="space-y-5">
            <div v-if="Object.keys(form.errors).length" class="alert alert-error shadow-lg">
                <div class="items-start">
                    <div>
                        <div v-for="(error, field) in form.errors" :key="field" v-text="error"/>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <input
                    type="email"
                    required
                    placeholder="Your email address"
                    class="input input-bordered w-full"
                    v-model="form.email"
                />

                <div class="divider"/>

                <input
                    type="text"
                    required
                    placeholder="Your first name"
                    class="input input-bordered w-full"
                    v-model="form.first_name"
                />
                <input
                    type="text"
                    required
                    placeholder="Your last name"
                    class="input input-bordered w-full"
                    v-model="form.last_name"
                />

                <div class="divider"/>

                <input
                    type="password"
                    required
                    placeholder="Your password"
                    class="input input-bordered w-full"
                    v-model="form.password"
                />
                <input
                    type="password"
                    required
                    placeholder="Password confirmation"
                    class="input input-bordered w-full"
                    v-model="form.password_confirmation"
                />
            </div>

            <button :class="{ 'loading': form.processing }" class="btn btn-block btn-primary">Sign Up</button>
        </form>

        <div class="text-center">
            <Link :href="route('auth.sign-in')" class="link link-hover opacity-70">Already have an account?</Link>
        </div>
    </div>
</template>

<script>
import { useStore, default as Layout } from '../../Layouts/Auth.vue'
import { useForm, Link } from '@inertiajs/vue3'
import { promiseTimeout } from '@vueuse/core'

// noinspection JSUnusedGlobalSymbols
export default {
    name: 'Pages/Auth/SignUp',
    layout: Layout,
    components: { Link },
    data: () => ({
        form: useForm({ email: '', first_name: '', last_name: '', password: '', password_confirmation: '' }),
    }),
    computed: {
        route: () => window.route,
    },
    mounted() {
        useStore().setTitle('Sign Up')
    },
    methods: {
        async submit() {
            this.form.processing = true
            await promiseTimeout(250)
            this.form.post('/auth/register')
        },
    },
}
</script>
