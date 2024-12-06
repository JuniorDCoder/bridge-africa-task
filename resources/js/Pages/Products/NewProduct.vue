<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Button from '@/Components/Button.vue';
import { toast } from 'vue3-toastify'

defineProps({
    categories: [Array, Object]
})

const form = useForm({
    name: '',
    description: '',
    details: '',
    price: '',
    giveaway_price: '',
    in_stock: true,
    image: null,
    category_id: '',
    images: [],
});
const handleFileChange = (event) => {
    form.image = event.target.files[0];
};

const handleMultipleFilesChange = (event) => {
    form.images = Array.from(event.target.files);
};

const submitForm = () => {
    form.post(route('store-product'), {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Product Created Successfully")
        },
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
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Upload a new Product
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="flex flex-col w-full max-w-4xl gap-6 px-6 py-12 mx-auto bg-white rounded-lg shadow-md">
            <form @submit.prevent="submitForm" class="flex flex-col gap-4" enctype="multipart/form-data">
                <div>
                    <InputLabel value="Product Name" />
                    <TextInput v-model="form.name" type="text" autofocus />
                    <InputError :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel value="Description" />
                    <TextInput v-model="form.description" type="text" />
                    <InputError :message="form.errors.description" />
                </div>

                <div>
                    <InputLabel value="Details" />
                    <TextInput v-model="form.details" type="text" />
                    <InputError :message="form.errors.details" />
                </div>

                <div class="flex gap-4">
                    <div class="flex-1">
                        <InputLabel value="Price" />
                        <TextInput v-model="form.price" type="number" step="0.01" />
                        <InputError :message="form.errors.price" />
                    </div>

                    <div class="flex-1">
                        <InputLabel value="Giveaway Price" />
                        <TextInput v-model="form.giveaway_price" type="number" step="0.01" />
                        <InputError :message="form.errors.giveaway_price" />
                    </div>
                </div>

                <div>
                    <InputLabel value="Category" />
                    <select v-model="form.category_id" class="p-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Select a Category</option>
                        <option v-for="category in categories" :value="category.id" :key="category.id">{{category.name}}</option>

                    </select>
                    <InputError :message="form.errors.category_id" />
                </div>

                <div>
                    <InputLabel value="Main Image" />
                    <input
                        type="file"
                        id="image"
                        class="block w-full px-3 py-2 mt-1 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        @change="handleFileChange"
                    />
                    <InputError :message="form.errors.image" class="mt-2" />
                </div>


                <div>
                    <InputLabel value="Additional Images" />
                    <input
                        type="file"
                        id="additional-images"
                        class="block w-full px-3 py-2 mt-1 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        name="images[]"
                        multiple
                        @change="handleMultipleFilesChange"
                    />

                    <InputError :message="form.errors.images" />
                </div>

                <div>
                    <InputLabel value="In Stock" />
                    <input v-model="form.in_stock" type="checkbox" class="rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    <InputError :message="form.errors.in_stock" />
                </div>

                <div class="flex justify-end gap-4 mt-4">
                    <Button type="reset" >Reset</Button>
                    <Button type="submit"  fill="secondary" textColor="white" >Create Product</Button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
