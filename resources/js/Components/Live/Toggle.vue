<script setup>

const props = defineProps({
    state: Boolean
})

</script>

<template>
    <span v-if="state" class="p-1 bg-green-500 rounded-xl text-sm">
        asdasdasd
    </span>
    <span v-else class="p-1 bg-red-500 rounded-xl text-sm">
        asda
    </span>
</template>

<style scoped>

</style>
