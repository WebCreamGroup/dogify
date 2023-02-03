<!--suppress JSUnusedGlobalSymbols -->
<template>
    <div v-if="Object.keys(errors || {}).length" class="alert alert-error shadow-lg">
        <div class="items-start">
            <div>
                <div v-for="(error, field) in errors || {}" :key="field" v-text="error"/>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        errors: { required: true }
    }
}
</script>
