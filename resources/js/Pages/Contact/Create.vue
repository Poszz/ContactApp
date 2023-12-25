<template>
    <Head title="Create New Contact" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New Contact
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submitForm">
                            <div class="grid grid-cols-1 gap-6 mt-4">
                                <div>
                                    <label
                                        class="block text-gray-700"
                                        for="name"
                                        >Name</label
                                    >
                                    <input
                                        v-model="contact.name"
                                        type="text"
                                        id="name"
                                        class="w-full mt-2 border rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        required
                                    />
                                </div>

                                <div>
                                    <label
                                        class="block text-gray-700"
                                        for="email"
                                        >Email</label
                                    >
                                    <input
                                        v-model="contact.email"
                                        type="email"
                                        id="email"
                                        class="w-full mt-2 border rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        required
                                    />
                                </div>

                                <div>
                                    <label
                                        class="block text-gray-700"
                                        for="phone"
                                        >Phone</label
                                    >
                                    <input
                                        v-model="contact.phone"
                                        type="text"
                                        id="phone"
                                        class="w-full mt-2 border rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    />
                                </div>

                                <div>
                                    <label
                                        class="block text-gray-700"
                                        for="address"
                                        >Address</label
                                    >
                                    <input
                                        v-model="contact.address"
                                        type="text"
                                        id="address"
                                        class="w-full mt-2 border rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    />
                                </div>

                                <div>
                                    <label
                                        class="block text-gray-700"
                                        for="desc"
                                        >Description</label
                                    >
                                    <textarea
                                        v-model="contact.desc"
                                        id="desc"
                                        class="w-full mt-2 border rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        rows="4"
                                    ></textarea>
                                </div>
                            </div>

                            <div class="flex justify-end mt-6">
                                <button
                                    type="submit"
                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                                >
                                    Save Contact
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref } from "vue";
</script>

<script>
export default {
    components: {
        Head,
        AuthenticatedLayout,
    },

    data() {
        return {
            contact: {
                name: "",
                email: "",
                phone: "",
                address: "",
                desc: "",
            },
        };
    },

    methods: {
        submitForm() {
            this.$inertia.post(route("contact.store"), this.contact);
            this.$swal.fire({
                title: "Added!",
                text: "Contact has been added",
                icon: "success",
                timer: 1000,
                showConfirmButton: false,
            });
        },
    },
};
</script>
