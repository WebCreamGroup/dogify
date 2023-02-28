<script setup>
import { Combobox, ComboboxButton, ComboboxOptions, ComboboxOption, ComboboxInput } from '@headlessui/vue'
import { ref, computed } from 'vue'

defineEmits(['update:modelValue'])
const props = defineProps({
    modelValue: null,
    options: { type: Array, required: true },
    placeholder: String,
    nullable: Boolean,
})

const query = ref('')

const filteredOptions = computed(() => query.value
    ? props.options.filter(({ key, value }) => value.toLowerCase().includes(query.value.toLowerCase()))
    : props.options)
</script>

<template>
    <div class="relative">
        <Combobox :model-value="modelValue" @update:modelValue="value => $emit('update:modelValue', value)">
            <div class="flex items-center gap-3">
                <ComboboxButton class="w-full">
                    <ComboboxInput
                        @change="query = $event.target.value"
                        :display-value="key => options.find(option => option.key === key)?.value"
                        :placeholder="placeholder"
                        class="select select-bordered w-full"
                        autocomplete="off"
                    />
                </ComboboxButton>

                <Transition name="fade">
                    <button v-if="modelValue && nullable" @click="$emit('update:modelValue', null)" class="btn btn-sm btn-circle btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </Transition>
            </div>

            <ComboboxOptions>
                <div class="absolute inset-x-0 top-full bg-base-100 shadow-xl border rounded-xl translate-y-3 z-10 p-5">
                    <ul class="space-y-1 max-h-72 overflow-y-auto">
                        <ComboboxOption v-for="{ key, value } in filteredOptions" :key="key" :value="key">
                            <li class="cursor-pointer py-1 rounded transition-all duration-200 hover:px-1.5 hover:bg-base-200/50" v-text="value"/>
                        </ComboboxOption>
                    </ul>
                </div>
            </ComboboxOptions>
        </Combobox>
    </div>
</template>
