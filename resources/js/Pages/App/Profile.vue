<!--suppress JSUnusedGlobalSymbols -->
<template>
    <main class="space-y-20">
        <section class="grid grid-cols-2 gap-20">
            <div class="space-y-5">
                <h2 class="card-title">Profile data</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci alias aliquid debitis esse, eveniet, hic illo incidunt minus modi nobis praesentium quia recusandae repudiandae tempora tenetur ut! Ipsa, optio?</p>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <form @submit.prevent="userDataForm.post(route('app.profile-save-userdata'))">
                    <div class="card-body space-y-5">
                        <div class="space-y-5">
                            <div class="form-control">
                                <label for="first_name" class="label">
                                    <span class="label-text">
                                        First name
                                        <sup class="text-accent">*</sup>
                                    </span>
                                </label>

                                <input v-model="userDataForm.first_name" id="first_name" type="text" name="first_name" placeholder="Your first name" class="input input-bordered" required/>
                            </div>

                            <div class="form-control">
                                <label for="last_name" class="label">
                                    <span class="label-text">
                                        Last name
                                        <sup class="text-accent">*</sup>
                                    </span>
                                </label>

                                <input v-model="userDataForm.last_name" id="last_name" type="text" name="last_name" placeholder="Your last name" class="input input-bordered" required/>
                            </div>

                            <div class="form-control">
                                <label for="email" class="label">
                                    <span class="label-text">
                                        Email
                                    </span>
                                </label>

                                <input :value="email" id="email" type="email" name="email" placeholder="Your email" class="input input-bordered" disabled/>
                            </div>
                        </div>

                        <FormErrors :errors="userDataForm.errors"/>

                        <div class="card-actions justify-end">
                            <button :class="{ 'loading': userDataForm.processing }" class="btn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="grid grid-cols-2 gap-20">
            <div class="space-y-5">
                <h2 class="card-title">Password</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias asperiores at consequuntur, debitis doloremque ea excepturi expedita fugit in magnam neque odit, possimus quo repellendus similique ut voluptates.</p>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <form @submit.prevent="passwordForm.post(route('app.profile-update-password'), { onSuccess: () => passwordForm.reset() })">
                    <div class="card-body space-y-5">
                        <div class="space-y-5">
                            <div class="form-control">
                                <label for="password" class="label">
                                    <span class="label-text">
                                        Password
                                        <sup class="text-accent">*</sup>
                                    </span>
                                </label>

                                <input v-model="passwordForm.password" id="password" type="password" name="password" placeholder="Type new password" class="input input-bordered" required/>
                            </div>

                            <div class="form-control">
                                <label for="password_confirmation" class="label">
                                    <span class="label-text">
                                        Password confirmation
                                        <sup class="text-accent">*</sup>
                                    </span>
                                </label>

                                <input v-model="passwordForm.password_confirmation" id="password_confirmation" type="password" name="password_confirmation" placeholder="Retype new password" class="input input-bordered" required/>
                            </div>
                        </div>

                        <FormErrors :errors="passwordForm.errors"/>

                        <div class="card-actions justify-end">
                            <button :class="{ 'loading': passwordForm.processing }" class="btn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</template>

<script>
import { usePage, useForm } from '@inertiajs/vue3'
import FormErrors from '../../Components/FormErrors.vue'

export default {
    data: () => ({
        userDataForm: useForm(usePage().props.auth.user),
        passwordForm: useForm({ password: '', password_confirmation: '' }),
    }),
    components: { FormErrors },
    computed: {
        route: () => window.route,
        email: () => usePage().props.auth.user.email,
    },
}
</script>
