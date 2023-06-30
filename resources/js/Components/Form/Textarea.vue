<script setup>

import {QuillEditor} from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    editor: Boolean
});

defineEmits(['update:modelValue']);

</script>

<template>
    <QuillEditor v-if="editor" theme="snow"
                 class="rounded-b-lg"
                 :content="modelValue"
                 content-type="html"
                 @update:content="$emit('update:modelValue', $event)"
    />
    <textarea v-else class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              rows="10"
              :value="modelValue"
              @input="$emit('update:modelValue', $event.target.value)"
              ref="textarea"
    ></textarea>
</template>

<style scoped>

</style>
