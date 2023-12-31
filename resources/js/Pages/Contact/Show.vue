<template>
    <Head title="Contact Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contact Details
            </h2>

            <div class="flex">
                <div class="ms-auto">
                    <Link
                        :href="route('contact.edit', contact.id)"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none cursor-pointer"
                    >
                        Edit Contact
                    </Link>
                    <!-- Button for Delete -->
                    <button
                        @click="confirmDelete"
                        class="inline-flex items-center px-4 mx-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none"
                    >
                        Delete Contact
                    </button>
                </div>
            </div>
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
import { Head, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

// Assuming you are passing the contact data as a prop from the parent component
defineProps({
    contact: Object,
});
</script>

<script>
export default {
    components: {
        AuthenticatedLayout,
    },

    methods: {
        confirmDelete() {
            this.$swal
                .fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.delete(
                            this.route("contact.destroy", this.contact.id)
                        );
                    } else if (result.dismiss === "cancel") {
                        this.$swal.fire(
                            "Cancelled",
                            "Your contact is safe :)",
                            "error"
                        );
                    }
                });
        },
    },
};
</script>
