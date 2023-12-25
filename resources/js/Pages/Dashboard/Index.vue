<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ContactCard from "./Components/ContactCard.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="My Contacts" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    My Contacts
                </h2>
                <div class="ms-auto">
                    <Link
                        :href="route('contact.create')"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none"
                    >
                        Add Contact
                    </Link>
                </div>
            </div>
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
