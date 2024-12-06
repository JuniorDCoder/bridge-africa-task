<template>
    <Head title="Product Details"/>
    <BaseLayout>
        <div class="flex flex-col w-full gap-4 py-12 md:flex-row">
            <div class="flex flex-col items-center w-full gap-5 md:w-1/2">
                <img :src="`/storage/` + product.image" alt="Product" class="w-[300px]">
                <div class="flex gap-3 mt-4 md:gap-5">
                    <img v-for="image in product.images" :key="image.id" :src="`/storage/` + image.image_path" alt="Product Image" class="md:w-[100px] w-[85px] md:h-[100px] object-cover">
                </div>
            </div>
            <div class="flex flex-col gap-3 md:w-1/2">
                <h1 class="text-2xl font-semibold text-primary-text">{{product.name}}</h1>
                <div class="flex gap-6">
                    <p v-if="product.giveaway_price" class="text-sm font-semibold text-gray-700 line-through">€{{ product.price }}</p>
                    <p v-else class="text-sm font-semibold text-gray-700">€{{ product.price }}</p>
                    <p v-if="product.giveaway_price" class="text-sm font-semibold text-gray-700">€{{ product.giveaway_price }}</p>
                </div>
                <p class="text-gray-700 md:w-4/5 text-md">{{product.description}} </p>
                <div   v-if="product.user_id !== $page.props.auth.user?.id" class="flex w-1/3 md:w-1/5 items-center justify-center md: gap-5 px-2 py-2.5 border border-gray-500 text-gray-700 rounded-sm">
                    <span @click="decrementQuantity" class="text-2xl cursor-pointer select-none">-</span>
                    <span class="text-2xl cursor-pointer">{{quantity}}</span>
                    <span @click="incrementQuantity" class="text-2xl cursor-pointer select-none">+</span>
                </div>
                <p class="text-gray-700">Category: <span>&nbsp;&nbsp;{{product.category.name}}</span> </p>
                <div v-if="product.user_id !== $page.props.auth.user?.id" class="flex items-center justify-between gap-8 md:w-2/3">
                    <Button @click="addToCart" fill="white" textColor="secondary" class="w-full md:w-1/2">Add to Cart</Button>
                    <Button :is-link="true" :url="{path: 'shop'}" fill="secondary" textColor="white" class="w-full md:w-1/2">Pay Now</Button>
                </div>
                <hr class="w-full my-4 border-gray-300" />
                <div class="flex items-center gap-2 text-lg md:text-sm">
                    <img src="/public/storage/icons/help.png" class="w-5 h-5" alt="Help" />
                    <p>Need some help? </p>
                    <Link href="/" class="text-secondary">Contact Us</Link>
                </div>

                <!-- Delete Button -->
                <div v-if="product.user_id === $page.props.auth.user?.id" class="flex flex-col items-center gap-10 md:flex-row">
                    <form :action="`/products/${product.id}`" method="POST" @submit.prevent="deleteProduct">
                        <Button type="submit" >Delete Product</Button>
                    </form>
                    <Button is-link="true"  fill="secondary" textColor="white" :url="{path: `/product`+`/${product.id}/edit`}" >Edit Product</Button>
                </div>

            </div>
        </div>
        <hr class="w-full mb-4 border-gray-300" />
    </BaseLayout>
</template>

<script setup>
import BaseLayout from '@//Layouts/BaseLayout.vue'
import Button from '@/Components/Button.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const quantity = ref(1);


const incrementQuantity = () => {
    quantity.value++;
};

const decrementQuantity = () => {
    if (quantity.value > 1) {
        quantity.value--;
    }
};

const props = defineProps({
    product: Object,
});

const form = useForm({
    product: props.product,
});

const addToCart = () => {
    // Handle add to cart
};

const deleteProduct = async () => {
    if (confirm('Are you sure you want to delete this product?')) {
        form.delete(route('product.delete', {product: form.product}), {
    });
    }
};
</script>

<style scoped>
/* Add your styles here */
</style>
