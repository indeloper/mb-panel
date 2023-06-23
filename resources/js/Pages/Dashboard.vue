<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout title="Dashboard" icon="home">
        <div class="py-6" style="height: 2000px">
            <div class="max-w-7xl mx-auto px-6">
                <div class="bg-gray-100 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
