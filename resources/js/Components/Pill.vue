<script setup>

import Icon from "@/Components/Icon.vue";

const props = defineProps({
    state: Boolean
})

</script>

<template>
    <span v-if="state" class="items-center bg-green-500 rounded-xl text-sm">
        <Icon name="check"/>
    </span>
    <span v-else class="p-1 bg-red-500 rounded-xl text-sm">
        &nbsp;
    </span>
</template>

<style scoped>

</style>
