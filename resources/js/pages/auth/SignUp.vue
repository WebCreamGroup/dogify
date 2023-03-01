<template>
    <div class="space-y-5">
        <h2 class="card-title">Sign Up</h2>

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
                    ref="autofocus"
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

            <!--suppress JSUnresolvedVariable -->
            <button :class="{ 'loading': form.processing }" class="btn btn-block btn-primary">Sign Up</button>
        </form>

        <div class="text-center">
            <Link :href="$route('auth.sign-in')" class="link link-hover opacity-70">Already have an account?</Link>
        </div>
    </div>
</template>

<script>
import { useToastStore, TYPE } from '@/stores/toast'
import { useForm, Link } from '@inertiajs/vue3'
import { promiseTimeout } from '@vueuse/core'
import { useRouteMixin } from '@/mixins/route'

// noinspection JSUnusedGlobalSymbols
export default {
    mixins: [useRouteMixin],
    components: { Link },
    data: () => ({
        form: useForm({ email: '', first_name: '', last_name: '', password: '', password_confirmation: '' }),
    }),
    mounted() {
        this.$refs.autofocus.focus()
    },
    methods: {
        async submit() {
            this.form.processing = true
            await promiseTimeout(250)

            this.form.post('/auth/register', {
                onSuccess: () => useToastStore().push(`Welcome a board ${this.form.first_name}!`, TYPE.SUCCESS),
            })
        },
    },
}
</script>
