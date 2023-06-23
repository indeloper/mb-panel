<script setup>

import {Link} from "@inertiajs/vue3";
import {computed} from "vue";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    title: {
        type: String
    },
    active: {
        type: Boolean
    }
})

const classes = computed(() =>
    props.active
        ? 'flex items-center p-3 border-gray-500 border-r-4'
        : 'flex items-center p-3'
);
</script>

<template>
    <Link :href="href">
        <li :class="classes">
            <slot/>
            <span class="hidden md:block">{{ title }}</span>
        </li>
    </Link>

</template>

<style scoped>

</style>
