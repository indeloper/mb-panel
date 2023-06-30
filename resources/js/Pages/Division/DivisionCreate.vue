<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {router, useForm} from "@inertiajs/vue3";
import DivisionForm from "@/Pages/Division/Partials/DivisionForm.vue";
import Swal from "sweetalert2";
import {store} from "@/store/store.js";
import Appbar from "@/Layouts/Partials/Appbar.vue";
import DropdownItem from "@/Components/Dropdown/Partials/DropdownItem.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DropdownButton from "@/Components/DropdownButton.vue";

const form = useForm({
    title: '',
    description: '',
    available: false
});

const submit = () => {
    store.store(form)
}

</script>

<template>
    <AuthenticatedLayout>

        <Appbar/>

        <form class="p-4" @submit.prevent="submit">
            <DivisionForm :form="form"/>

            <hr>

            <div class="mb-4 mt-4 flex justify-between gap-4">
                <DropdownButton>
                    <template #title>
                        {{ $t('Save') }}
                    </template>
                    <template #items>
                        <DropdownItem @click="store.store(form)">
                            {{ $t('Save and continue') }}
                        </DropdownItem>
                    </template>
                </DropdownButton>
                <SecondaryButton type="button"
                                 :disabled="store.loading"
                                 @click="router.visit(route(store.controller + '.index'))"
                >
                    {{ $t('Cancel') }}
                </SecondaryButton>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
