<script setup>

import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Textarea from "@/Components/Textarea.vue";

const props = defineProps({
    form: {
        type: Object,
        required: true
    }
});

</script>

<template>
    <div class="mb-4">
        <InputLabel for="title"
                    value="Наименование"/>

        <TextInput
            id="title"
            type="text"
            class="mt-1 block w-full"
            v-model="form.title"
            required
            autofocus
            autocomplete="title"
        />

        <InputError class="mt-2"
                    :message="form.errors.title"/>
    </div>

    <div class="mb-4">
        <InputLabel for="description"
                    value="Описание"/>

        <Textarea id="description"
                  v-model="form.description"
                  class="mt-1 block w-full"/>
    </div>

    <div class="mb-4">
        <Checkbox name="remember"
                  v-model:checked="form.available" />

        <span class="ml-2 text-sm text-gray-600">Available</span>
    </div>

</template>

<style scoped>

</style>
