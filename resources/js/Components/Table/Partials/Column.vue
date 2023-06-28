<script setup>
const props = defineProps({
    header: Boolean
})
</script>

<template>
    <th v-if="header" class="p-2">
        <slot/>
    </th>
    <td v-else class="p-4">
        <slot/>
    </td>
</template>

<style scoped>

</style>
