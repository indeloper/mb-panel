<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {router, useForm} from "@inertiajs/vue3";
import DivisionForm from "@/Pages/Division/Partials/DivisionForm.vue";
import Swal from "sweetalert2";
import {store} from "@/store/store.js";
import Appbar from "@/Layouts/Partials/Appbar.vue";

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
        </form>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
