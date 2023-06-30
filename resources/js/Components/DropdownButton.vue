<script setup>
import Icon from "@/Components/Icon.vue";
import {store} from "@/store/store.js";
import Dropdown from "@/Components/Dropdown/Dropdown.vue";

const props = defineProps({
    type: String,
})
</script>

<template>
    <div class="flex">
        <button :type="type"
                :disabled="store.loading"
                class="inline-flex items-center pl-4 py-2 bg-gray-800 border border-transparent rounded-l-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
        >
            <slot name="title"/>
        </button>
        <Dropdown>
            <template #trigger>
                <button type="button"
                        :disabled="store.loading"
                        class="inline-flex items-center p-4 py-2 bg-gray-800 border border-transparent rounded-r-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >
                    <Icon small light name="chevron-down"/>
                </button>
            </template>
            <template #content>
                <slot name="items"/>
            </template>
        </Dropdown>

    </div>
</template>

<style scoped>

</style>
