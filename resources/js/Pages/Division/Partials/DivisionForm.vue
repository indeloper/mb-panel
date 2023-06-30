<script setup>

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import Textarea from "@/Components/Form/Textarea.vue";
import {store} from "@/store/store.js";
import Switch from "@/Components/Switch.vue";

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
                    :value="$t('title')"/>

        <TextInput
            id="title"
            type="text"
            class="mt-1 block w-full transition ease-in-out disabled:bg-gray-200"
            v-model="form.title"
            required
            autofocus
            autocomplete="title"
            :disabled="store.loading"
        />

        <InputError class="mt-2"
                    :message="form.errors.title"/>
    </div>

    <div class="mb-4">
        <InputLabel for="description"
                    :value="$t('description')"/>

        <Textarea id="description"
                  editor
                  v-model="form.description"
                  class="mt-1 block w-full transition ease-in-out disabled:bg-gray-200"
                  :disabled="store.loading"/>

        <InputError class="mt-2"
                    :message="form.errors.description"/>
    </div>

    <div class="mb-4">
        <Switch v-model:checked="form.available"
                :disabled="store.loading"
                label="Available"/>
    </div>

</template>

<style scoped>

</style>
