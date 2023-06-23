<script setup>

import {Link} from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    title: {
        type: String
    }
})
</script>

<template>
    <Link :href="href" :class="classes">
        <li class="flex items-center">
            <slot/>
            <span class="hidden md:block">
                        {{ title }}
                    </span>
        </li>
    </Link>

</template>

<style scoped>

</style>
