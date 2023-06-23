<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Table from "@/Components/Table.vue";

const props = defineProps({
    divisions: Object
})
</script>

<template>
    <AuthenticatedLayout>
        <div class="p-6">
            <Table :items="divisions" :fields="['title']" :actions="['edit']" available destroy/>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
