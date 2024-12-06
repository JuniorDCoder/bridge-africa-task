<template>
    <Head title="Welcome" />
    <BaseLayout>

        <div data-aos="fade-up" data-aos-delay=300 class="flex flex-col items-center justify-center gap-4">
            <h1 class="text-3xl font-bold md:text-4xl text-primary-text">Optimized Elegance</h1>
            <p class="text-primary-text">Experience gadgets in a whole new way.</p>
            <Button :is-link="true" :url="{path: 'shop'}" :rounded="true" fill="secondary" textColor="white">Shop Now</Button>
        </div>

        <div data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="flex flex-col items-center w-full gap-4 my-12">
            <h3 class="text-3xl font-semibold text-center md:text-4xl text-primary-text">Our <span class="text-blue-500">Latest</span> and <span class="text-blue-500">Greatest</span></h3>
            <p class="text-2xl text-center text-primary-text">Advanced ecosystems at your disposal</p>
           <LatestProducts :products="latestProducts"/>
        </div>

        <div class="flex flex-col items-center w-full gap-4 my-12 lg:px-16" data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 >
            <h3 class="mb-3 text-3xl font-semibold lg::text-4xl text-primary-text">Reasons to shop with us</h3>
            <ShopWithUs :shop-with-us="shopWithUs"/>
        </div>
    </BaseLayout>
</template>

<script setup>
import {Link, Head} from "@inertiajs/vue3";
import BaseLayout from '../Layouts/BaseLayout.vue'
import Button from '../Components/Button.vue';

import LatestProducts from "../Components/Sections/LatestProducts.vue";

import ShopWithUs from "../Components/Sections/ShopWithUs.vue";

import Support from '/public/storage/icons/support.png'
import Car from '/public/storage/icons/car.png'
import Security from '/public/storage/icons/security.png'

const shopWithUs = [
    { image: Support, description: '<span class="text-[#32CD32]"">24/7 responsive customer support</span>, ensuring your <span class="text-[#32CD32]">questions</span> and <span class="text-[#32CD32]">concerns</span> are <span class="text-[#32CD32]">resolved swiftly</span>.' },
    { image: Car, description: '<span class="text-[#FF4500]">Fast delivery</span> within <span class="text-[#FF4500]">Europe</span> with <span class="text-[#FF4500]">reliable and prompt shipping options tailored</span> to <span class="text-[#FF4500]">your needs</span>.' },
    { image: Security, description: '<span class="text-[#007AFF]">Our secure</span> and <span class="text-[#007AFF]">encrypted payment systems, ensures worry-free transactions every time</span>.' }
];

const props = defineProps({
    categories: [Array, Object],
    latestProducts: [Array, Object]
})

console.log(props.categories)

</script>

<style  scoped>

</style>
