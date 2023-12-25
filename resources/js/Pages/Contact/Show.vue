<template>
    <Head title="Contact Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contact Details
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ contact.name }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Email: {{ contact.email }}
                        </p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Phone: {{ contact.phone }}
                        </p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Address: {{ contact.address }}
                        </p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Description: {{ contact.desc }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

// Assuming you are passing the contact data as a prop from the parent component
defineProps({
    contact: Object,
});
</script>
