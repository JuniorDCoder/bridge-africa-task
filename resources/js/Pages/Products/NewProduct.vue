<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    description: '',
    details: '',
    price: '',
    giveaway_price: '',
    in_stock: false,
    category_id: '',
    image: null,
    images: []
});

const submit = () => {
    form.post(route('store-product'), {
        onSuccess: () => {
            alert('Product created successfully!');
        }
    });
};
</script>

<template>
    <Head title="Create New Product" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create New Product
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white shadow-md sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <!-- Product Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input
                                type="text"
                                id="name"
                                v-model="form.name"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required
                            />
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea
                                id="description"
                                v-model="form.description"
                                rows="3"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required
                            ></textarea>
                        </div>

                        <!-- Details -->
                        <div class="mb-4">
                            <label for="details" class="block text-sm font-medium text-gray-700">Details (HTML)</label>
                            <textarea
                                id="details"
                                v-model="form.details"
                                rows="5"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            ></textarea>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input
                                type="number"
                                id="price"
                                v-model="form.price"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required
                            />
                        </div>

                        <!-- Giveaway Price -->
                        <div class="mb-4">
                            <label for="giveaway_price" class="block text-sm font-medium text-gray-700">Giveaway Price</label>
                            <input
                                type="number"
                                id="giveaway_price"
                                v-model="form.giveaway_price"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            />
                        </div>

                        <!-- In Stock -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">In Stock</label>
                            <input
                                type="checkbox"
                                v-model="form.in_stock"
                                class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                            />
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <input
                                type="number"
                                id="category_id"
                                v-model="form.category_id"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                required
                            />
                        </div>

                        <!-- Main Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Main Image</label>
                            <input
                                type="file"
                                id="image"
                                @change="form.image = $event.target.files[0]"
                                class="block w-full mt-1"
                            />
                        </div>

                        <!-- Additional Images -->
                        <div class="mb-4">
                            <label for="images" class="block text-sm font-medium text-gray-700">Additional Images</label>
                            <input
                                type="file"
                                id="images"
                                multiple
                                @change="form.images = Array.from($event.target.files)"
                                class="block w-full mt-1"
                            />
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 font-semibold tracking-widest text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 disabled:opacity-25"
                        >
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
