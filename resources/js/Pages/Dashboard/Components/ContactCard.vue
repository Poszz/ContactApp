<template>
    <div class="w-full px-4">
        <div class="flex flex-col items-center relative">
            <div class="w-full">
                <div
                    class="my-2 p-1 bg-white flex border border-gray-200 rounded"
                >
                    <div
                        class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200"
                    >
                        <button
                            class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="100%"
                                height="100%"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-chevron-up w-4 h-4"
                            >
                                <polyline points="18 15 12 9 6 15"></polyline>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="absolute shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj"
            >
                <div class="flex flex-col w-full">
                    <div
                        class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
                        @click="toContact"
                    >
                        <div
                            class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100"
                        >
                            <div class="w-6 flex flex-col items-center">
                                <div
                                    class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full"
                                >
                                    <img
                                        class="rounded-full"
                                        alt="A"
                                        src="https://api.dicebear.com/7.x/pixel-art/svg?seed={{ contact.name }}"
                                    />
                                </div>
                            </div>
                            <div class="w-full items-center flex">
                                <div class="mx-2 -mt-1">
                                    <slot name="name">{{ contact.name }}</slot>
                                    <div
                                        class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500"
                                    >
                                        <slot name="email">
                                            {{ contact.email }}
                                        </slot>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        contact: Object,
    },
    methods: {
        toContact() {
            this.$inertia.visit(route("contact.show", this.contact.id));
        },
    },
};
</script>
