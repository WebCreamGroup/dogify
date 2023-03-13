<template>
    <ModalBox>
        <template v-slot:title>
            The title
        </template>

        <p class="py-4">aaa = {{ a }}</p>
        <p v-for="item in 3" class="py-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque consectetur, distinctio dolore dolorem, doloribus facilis fuga inventore maiores optio, perferendis porro quibusdam saepe tenetur unde voluptatem! Architecto quo sapiente suscipit.</p>

        <template v-slot:actions>
            <button @click="$emit('close')" type="button" class="btn">Yay!</button>
        </template>
    </ModalBox>
</template>

<script>
import ModalBox from '@/components/modal/Box.vue'

export default {
    components: { ModalBox },
    props: ['a', 'b']
}
</script>
