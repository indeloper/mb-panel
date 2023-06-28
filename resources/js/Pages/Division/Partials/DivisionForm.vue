<script setup>

import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Textarea from "@/Components/Textarea.vue";
import Swal from "sweetalert2";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";
import {store} from "@/store/store.js";

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
                    value="Описание"/>

        <Textarea id="description"
                  v-model="form.description"
                  class="mt-1 block w-full transition ease-in-out disabled:bg-gray-200"
                  :disabled="store.loading"/>

        <InputError class="mt-2"
                    :message="form.errors.description"/>
    </div>

    <div class="mb-4">
        <Checkbox name="available"
                  v-model:checked="form.available"
                  :disabled="store.loading"/>

        <span class="ml-2 text-sm text-gray-600">Available</span>
    </div>

    <div class="mb-4">
        <PrimaryButton :disabled="store.loading">
            <span>Submit</span>
        </PrimaryButton>
    </div>

</template>

<style scoped>

</style>
