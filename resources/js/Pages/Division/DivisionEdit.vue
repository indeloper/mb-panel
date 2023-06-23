<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import {useForm} from "@inertiajs/vue3";
import DivisionForm from "@/Pages/Division/Partials/DivisionForm.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

const props = defineProps({
    division: Object
})

const form = useForm(props.division);

const destroy = () => {
    confirm('Are you sure?')
        ? form.delete(route('division.destroy', props.division))
        : null;
}

</script>

<template>
    <AuthenticatedLayout>
        <form class="p-4" @submit.prevent="form.put(route('division.update', division))">

            <DivisionForm :form="form"/>

            <div class="flex justify-between">

                <DangerButton type="button" @click="destroy">
                    {{ $t('delete') }}
                </DangerButton>

                <PrimaryButton>
                    {{ $t('save') }}
                </PrimaryButton>

            </div>
        </form>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
