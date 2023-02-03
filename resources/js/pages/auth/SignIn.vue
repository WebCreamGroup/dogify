<template>
    <div class="space-y-5">
        <h2 class="card-title">Sign In</h2>

        <form @submit.prevent="submit" class="space-y-5">
            <div v-if="Object.keys(form.errors || {}).length" class="alert alert-error shadow-lg">
                <div class="items-start">
                    <div>
                        <div v-for="(error, field) in form.errors || {}" :key="field" v-text="error"/>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <input
                    ref="autofocus"
                    type="email"
                    required
                    placeholder="Your email address"
                    class="input input-bordered w-full"
                    v-model="form.email"
                />

                <div class="form-control w-full max-w-xs">
                    <input
                        type="password"
                        required
                        placeholder="Your password"
                        class="input input-bordered w-full"
                        v-model="form.password"
                    />

                    <span class="label justify-end">
                        <Link :href="route('auth.sign-in')" class="link link-hover opacity-70 label-text-alt">Forgot your password?</Link>
                    </span>
                </div>
            </div>

            <button :class="{ 'loading': form.processing }" class="btn btn-block btn-primary">Sign In</button>
        </form>

        <div class="text-center">
            <Link :href="route('auth.sign-up')" class="link link-hover opacity-70">You don't have an account?</Link>
        </div>

        <div class="divider">OR</div>

        <div class="grid grid-cols-2 gap-3">
            <button disabled class="btn gap-2 bg-blue-600 border-blue-600 hover:bg-blue-700 hover:border-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5">
                    <path
                        fill="currentColor"
                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
                    />
                </svg>

                Facebook
            </button>

            <button disabled class="btn gap-2 bg-red-600 border-red-600 hover:bg-red-700 hover:border-red-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" class="w-5 h-5">
                    <path
                        fill="currentColor"
                        d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"
                    />
                </svg>

                Google
            </button>
        </div>
    </div>
</template>

<script>
import { useToastStore, TYPE } from '../../stores/toast'
import { useForm, Link } from '@inertiajs/vue3'
import { promiseTimeout } from '@vueuse/core'

// noinspection JSUnusedGlobalSymbols
export default {
    components: { Link },
    data: () => ({
        form: useForm({ email: '', password: '' }),
    }),
    computed: {
        route: () => window.route,
    },
    mounted() {
        this.$refs.autofocus.focus()
    },
    methods: {
        async submit() {
            this.form.processing = true
            await promiseTimeout(250)

            this.form.post('/auth/login', {
                onSuccess: () => useToastStore().push('Successfully signed in!', TYPE.SUCCESS),
            })
        },
    },
}
</script>
