<script setup>
import {computed} from 'vue';
import {store} from "@/store/store.js";

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Boolean, Number],
        required: true,
    },
    label: String
});

const proxyChecked = computed({
    get() {
        return !!+props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
    <div class="flex">

        <div
            :class="{'bg-slate-900/10 ring-slate-900/5': !checked, 'bg-indigo-600 ring-black/20': checked}"
            class="mr-2 pointer-events-auto h-6 w-10 rounded-full p-1 ring-1 ring-inset transition duration-200 ease-in-out cursor-pointer"
            @click="store.loading ? null : $emit('update:checked', !checked)">
            <div
                :class="{'translate-x-4': checked}"
                class="h-4 w-4 rounded-full bg-white shadow-sm ring-1 ring-slate-700/10 transition duration-200 ease-in-out">

            </div>
        </div>
        <label v-if="label">
            {{ label }}
        </label>
    </div>

</template>

<style scoped>

</style>
