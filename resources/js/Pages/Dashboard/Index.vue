<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ContactCard from "./Components/ContactCard.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="My Contacts" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Contacts
            </h2>
        </template>

        <div class="py-12">
            <div class="text-gray-900">
                <div class="flex flex-col items-center">
                    <div
                        class="w-full md:w-full flex flex-col items-center h-auto"
                    >
                        <ContactCard
                            v-for="contact in contacts"
                            :contact="contact"
                            :key="contact.id"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        contacts: Array,
    },
};
</script>
