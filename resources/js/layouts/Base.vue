<script setup>
import { shallowRef, getCurrentInstance } from 'vue'
import Toast from '@/components/layout/Toast.vue'
import ModalContainer from '@/components/modal/Container.vue'

const baseLayout = shallowRef(getCurrentInstance().type)
</script>

<template>
    <Transition name="fade" mode="out-in">
        <!--suppress JSUnresolvedVariable -->
        <Component :is="baseLayout.layout">
            <Transition name="fade" mode="out-in">
                <slot/>
            </Transition>
        </Component>
    </Transition>

    <ModalContainer/>
    <Toast/>
</template>
