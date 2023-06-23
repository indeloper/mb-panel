<script setup>
defineProps({
    modelValue: {
        type: String,
        required: true,
    },
});

defineEmits(['update:modelValue']);

</script>

<template>
    <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              :value="modelValue"
              @input="$emit('update:modelValue', $event.target.value)"
    ></textarea>
</template>

<style scoped>

</style>
