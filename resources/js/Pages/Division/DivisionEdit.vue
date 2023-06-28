<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import {useForm} from "@inertiajs/vue3";
import DivisionForm from "@/Pages/Division/Partials/DivisionForm.vue";
import DangerButton from "@/Components/DangerButton.vue";
import {store} from "@/store/store.js";
import Appbar from "@/Layouts/Partials/Appbar.vue";
import Icon from "@/Components/Icon.vue";

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

        <Appbar>
            <DangerButton @click="destroy">
                {{ $t('destroy') }}
            </DangerButton>
        </Appbar>

        <form class="p-4" @submit.prevent="submit">
            <DivisionForm :form="form"/>
        </form>

    </AuthenticatedLayout>
</template>

<style scoped>

</style>
