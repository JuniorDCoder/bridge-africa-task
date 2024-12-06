<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ShopItem from '@/Components/ShopItem.vue';
import Button from '@/Components/Button.vue';

const props = defineProps({
  productsCount: Number,
  categoriesCount: Number,
  usersCount: Number,
  products: [Object, Array],
});

const animateClass = ref("opacity-0");
const onAnimationEnd = () => {
  animateClass.value = "opacity-100 transition-all duration-700 ease-in-out";
};

onMounted(() => {
  setTimeout(onAnimationEnd, 500);
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    <!-- Products Card -->
                    <div
                        class="flex items-center justify-between p-6 transition-all duration-700 ease-in-out transform bg-white rounded-lg shadow-lg"
                        :class="animateClass"
                    >
                        <div class="flex items-center space-x-4">
                            <svg
                                class="w-12 h-12 text-blue-600"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 11c0 .553-.447 1-1 1H7a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4z"
                                />
                            </svg>
                            <div>
                                <p class="text-lg font-semibold">Products</p>
                                <p class="text-2xl font-bold">{{ props.productsCount }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Card -->
                    <div
                        class="flex items-center justify-between p-6 transition-all duration-700 ease-in-out transform bg-white rounded-lg shadow-lg"
                        :class="animateClass"
                    >
                        <div class="flex items-center space-x-4">
                            <svg
                                class="w-12 h-12 text-green-600"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6v12m6-6H6"
                                />
                            </svg>
                            <div>
                                <p class="text-lg font-semibold">Categories</p>
                                <p class="text-2xl font-bold">{{ props.categoriesCount }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Users Card -->
                    <div
                        class="flex items-center justify-between p-6 transition-all duration-700 ease-in-out transform bg-white rounded-lg shadow-lg"
                        :class="animateClass"
                    >
                        <div class="flex items-center space-x-4">
                            <svg
                                class="w-12 h-12 text-red-600"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A10.005 10.005 0 0 0 18 12l3.64-3.64a9.95 9.95 0 0 0 0-13.68L15 8h-5l1.405 1.405A10.005 10.005 0 0 0 12 12l-3.64 3.64a9.95 9.95 0 0 0 0 13.68L15 17z"
                                />
                            </svg>
                            <div>
                                <p class="text-lg font-semibold">Users</p>
                                <p class="text-2xl font-bold">{{ props.usersCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-full gap-3 px-4 py-12 md:px-24">
            <Button :is-link="true" :url="{path: 'create-product'}" fill="secondary" textColor="white" class="w-full mb-5">Upload New Product</Button>
            <h3 class="text-3xl text-primary-text">
                Last 5 recent products
            </h3>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <ShopItem v-for="product in (products || [])" :key="product.id" :product="product"/>
            </div>
            <div class="flex items-center justify-between mt-4">
                <div>
                    Showing {{ products?.from }} to {{ products?.to }} of {{ products?.total }} results
                </div>
                <div class="flex items-center gap-2">
                    <button @click="goToPage(products.current_page - 1)" :disabled="!products?.prev_page_url" class="px-4 py-2 text-white rounded bg-primary-text">Previous</button>
                    <button @click="goToPage(products.current_page + 1)" :disabled="!products?.next_page_url" class="px-4 py-2 text-white rounded bg-secondary">Next</button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Optional: Add custom styles for card animation */
.card {
  transition: transform 0.3s ease;
}

.card:hover {
  transform: scale(1.05);
}
</style>
