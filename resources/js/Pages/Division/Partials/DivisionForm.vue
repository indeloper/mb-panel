<script setup>

import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Textarea from "@/Components/Textarea.vue";
import Swal from "sweetalert2";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {router, useForm} from "@inertiajs/vue3";
import {store} from "@/store/store.js";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Switch from "@/Components/Switch.vue";
import DropdownButton from "@/Components/DropdownButton.vue";
import DropdownItem from "@/Components/Dropdown/Partials/DropdownItem.vue";

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
        <Switch v-model:checked="form.available"
                :disabled="store.loading"
                label="Available"/>
    </div>

</template>

<style scoped>

</style>
