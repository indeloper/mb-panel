<script setup>

const props = defineProps({start: Boolean, end: Boolean})
</script>

<template>
    <div v-if="!props.end"
        class="flex items-center rounded-l-xl shadow-lg bg-white dark:bg-gray-800 text-blue-600 m-2 mr-0">
        <ul>
            <slot/>
        </ul>
    </div>
    <div v-if="props.end"
        class="absolute flex items-center justify-center rounded-l-xl shadow-lg bg-white dark:bg-gray-800 text-blue-600 m-2 md:m-0 bottom-0 md:bottom-12">
        <ul>
            <slot/>
        </ul>
    </div>
</template>

<style scoped>

</style>
