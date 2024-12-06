<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ShopItem from '@/Components/ShopItem.vue';
import Button from '@/Components/Button.vue';

const props = defineProps({
    products: [ Object, Array]
})

console.log(props.products)
</script>

<template>
    <Head title="My Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                My Products
            </h2>
        </template>

        <div class="px-4 py-12 md:px-0">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                      Below  Here is a collection of all your created Products
                    </div>
                </div>
            </div>

        </div>
        <div class="flex flex-col w-full gap-3 px-4 py-12 md:px-24">
            <Button :is-link="true" :url="{path: 'create-product'}" fill="secondary" textColor="white" class="w-full mb-5">Upload New Product</Button>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <ShopItem v-for="product in (products?.data || [])" :key="product.id" :product="product"/>
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
