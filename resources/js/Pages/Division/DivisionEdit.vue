<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import {router, useForm} from "@inertiajs/vue3";
import DivisionForm from "@/Pages/Division/Partials/DivisionForm.vue";
import DangerButton from "@/Components/DangerButton.vue";
import {store} from "@/store/store.js";
import Appbar from "@/Layouts/Partials/Appbar.vue";
import Icon from "@/Components/Icon.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DropdownItem from "@/Components/Dropdown/Partials/DropdownItem.vue";
import DropdownButton from "@/Components/DropdownButton.vue";
import Swal from "sweetalert2";

const props = defineProps({
    division: Object
})

const form = useForm(props.division);

const submit = () => {
    store.update(form)
}

const destroy = () => {
    store.destroy(form)
}

</script>

<template>
    <AuthenticatedLayout :item="division">

        <Appbar :item="form"/>

        <form class="p-4" @submit.prevent="submit">
            <DivisionForm :form="form"/>

            <hr>

            <div class="mb-4 mt-4 flex justify-between gap-4">
                <DropdownButton>
                    <template #title>
                        {{ $t('Save') }}
                    </template>
                    <template #items>
                        <DropdownItem @click="store.update(form, false)">
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
