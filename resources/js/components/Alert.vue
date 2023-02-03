<template>
    <div
        :class="{
            'alert-info': this.type === TYPE.INFO,
            'alert-success': this.type === TYPE.SUCCESS,
            'alert-warning': this.type === TYPE.WARNING,
            'alert-error': this.type === TYPE.ERROR,
        }"
        class="alert shadow-lg"
    >
        <div>
            <svg
                v-if="this.type === TYPE.INFO"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                class="stroke-current flex-shrink-0 w-6 h-6"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                ></path>
            </svg>

            <svg
                v-else-if="this.type === TYPE.SUCCESS"
                xmlns="http://www.w3.org/2000/svg"
                class="stroke-current flex-shrink-0 h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>

            <svg
                v-else-if="this.type === TYPE.WARNING"
                xmlns="http://www.w3.org/2000/svg"
                class="stroke-current flex-shrink-0 h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                />
            </svg>

            <svg
                v-else-if="this.type === TYPE.ERROR"
                xmlns="http://www.w3.org/2000/svg"
                class="stroke-current flex-shrink-0 h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>

            <div>
                <slot/>
            </div>
        </div>
    </div>
</template>

<script>
export const TYPE = Object.freeze({
    INFO: 'info',
    SUCCESS: 'success',
    WARNING: 'warning',
    ERROR: 'error',
})

// noinspection JSUnusedGlobalSymbols
export default {
    props: {
        type: {
            type: String,
            default: TYPE.INFO,
            validator: (value) => Object.values(TYPE).includes(value),
        },
    },
    computed: {
        TYPE: () => TYPE,
    },
}
</script>
