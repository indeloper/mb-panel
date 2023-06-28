<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Table from "@/Components/Table/Table.vue";
import Appbar from "@/Layouts/Partials/Appbar.vue";

const props = defineProps({
    divisions: Object
})
</script>

<template>
    <AuthenticatedLayout>

        <Appbar/>

        <div class="p-6">
            <Table :items="divisions"
                   :fields="['title']"
                   :actions="['edit']"
                   dropdown="title"
                   available
                   destroy/>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
