<script setup>

defineProps({
    modelValue: {
        type: String,
        required: false,
    },
});

defineEmits(['update:modelValue']);
</script>

<template>
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
