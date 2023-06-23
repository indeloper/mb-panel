<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DivisionForm from "@/Pages/Division/Partials/DivisionForm.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    title: '',
    description: '',
    available: false
});

</script>

<template>
    <AuthenticatedLayout title="Разделы" action="Создание" icon="folder">
        <form class="p-4" @submit.prevent="form.post(route('division.store'))">
            <DivisionForm :form="form"/>
            <PrimaryButton>
                Submit
            </PrimaryButton>
        </form>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
