<template>
    <BaseLayout>
        <div class="flex flex-col w-full py-4">
            <h1 class="pb-9 text-4xl text-center font-semibold text-primary-text">Cart</h1>
            <div class="flex gap-[-2px] items-center justify-center">
                <div class="border flex items-center justify-center border-[#32CD32] rounded-full p-2">
                    <div class="bg-[#32CD32] h-2 w-2 rounded-full"></div>
                </div>
                <div class="h-[0.5px] bg-gray-500 w-[300px]"></div>
                <div class="border flex items-center justify-center border-gray-500 rounded-full p-2">
                    <div class="bg-gray-500 h-2 w-2 rounded-full"></div>
                </div>
                <div class="h-[0.5px] bg-gray-500 w-[300px]"></div>
                <div class="border flex items-center justify-center border-gray-500 rounded-full p-2">
                    <div class="bg-gray-500 h-2 w-2 rounded-full"></div>
                </div>

            </div>
            <div class="flex items-center justify-between w-full md:w-1/2 mx-auto mt-4">
                <h3 class="font-semibold text-primary-text">Shipping</h3>
                <h3 class="text-primary-dark">Payment</h3>
                <h3 class="text-primary-dark">Confirmation</h3>
            </div>

            <div class="my-9 mx-auto md:p-9 w-full flex md:flex-row flex-col md:gap-4 justify-center">
                <div class="flex-col flex gap-4 md:w-2/3 bg-white py-4 md:px-12 px-5 text-sm">
                    <h3 class="text-primary-text font-semibold text-center">Contact Information</h3>
                    <InputField label="" placeholder="Email" type="email" v-model="form.email" />
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="" id="">
                        <span class="text-sm text-primary-dark">Email me with News and Offers</span>
                    </div>
                    <h3 class="text-sm text-primary-text">Delivery Method</h3>
                    <div class="flex gap-5 justify-center items-center text-sm">
                        <div class="flex gap-2">
                            <input type="radio">
                            <p>Ship</p>
                        </div>
                        <div class="flex gap-2">
                            <input type="radio">
                            <p>Pickup</p>
                        </div>
                    </div>
                    <h1 class="pb-3 text-md font-semibold text-primary-text">Shipping Address</h1>
                    <form class="flex flex-col gap-2 w-full">
                        <div class="flex md:flex-row flex-col w-full gap-3">
                            <InputField class="md:w-1/2" label="" placeholder="First Name" type="text" v-model="form.first_name" />
                            <InputField class="md:w-1/2" label="" placeholder="Last Name" type="text" v-model="form.first_name" />
                        </div>
                        <InputField label="" placeholder="Country" type="text" v-model="form.country" />
                        <InputField label="" placeholder="Address" type="text" v-model="form.address" />
                        <InputField label="" placeholder="Apartment" type="text" v-model="form.apartment" />
                        <div class="flex md:flex-row flex-col w-full gap-3 justify-between">
                            <InputField label="" class="1/3" placeholder="City" type="text" v-model="form.city" />
                            <InputField label="" class="1/3" placeholder="Province" type="text" v-model="form.province" />
                            <InputField label="" class="1/3" placeholder="Postal Code" type="text" v-model="form.postal_code" />
                        </div>
                        <div class="flex gap-2 mt-4 text-primary-dark">
                            <input type="radio">
                            <p>Save this information for next time</p>
                        </div>

                        <div class="md:flex hidden justify-between w-full pb-6 items-center mt-6">
                            <Link :href="route('cart.details')" class="flex gap-3 text-sm text-secondary"><p><</p> Return to Cart</Link>
                            <Button :is-link="true" :url="{path: route('checkout')}" class="w-1/2" fill="secondary" textColor="white" :rounded="true">Continue to payment</Button>
                        </div>
                    </form>
                </div>
                <div class="flex flex-col md:gap-4 w-full">
                    <div class="flex-col gap-3 bg-white p-4 h-[50%]">
                        <h3 class="text-primary-text font-semibold text-sm text-center">Order Summary</h3>
                        <hr class="mb-6 mt-3">
                        <div class="flex-col flex gap-4">
                            <div class="flex justify-between gap-4">
                                <span class="text-primary-text">Items Total ({{count}})</span>
                                <span class="font-bold">€{{subtotal}}</span>
                            </div>
                            <div class="flex justify-between gap-4">
                                <span class="text-primary-text">Discounts</span>
                                <span class="font-bold">€0</span>
                            </div>
                            <div class="flex justify-between gap-4">
                                <span class="text-primary-text">Subtotal</span>
                                <span class="font-bold">€{{ subtotal }}</span>
                            </div>
                            <div class="flex justify-between gap-4">
                                <span class="text-primary-text">Shipping</span>
                                <span class="font-bold">€{{shipping}}</span>
                            </div>
                            <hr class="mb-3 mt-3">
                            <div class="flex justify-between font-bold gap-4 text-2xl">
                                <span class="text-primary-text">Total</span>
                                <span class="font-bold">€{{total}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 bg-white p-4 h-[20%]">
                        <div class="flex gap-3 items-center">
                            <img src="/public/storage/icons/shield-check.png">
                            <span class="text-[#32CD32]">Buyer Protection</span>
                        </div>
                        <p class="text-md text-primary-text">Get full refund if the item is not as described or
                            if not delivered
                        </p>

                        <div class="flex md:hidden justify-between w-full pb-6 items-center mt-6">
                            <Link :href="route('cart.details')" class="flex gap-3 text-sm text-secondary"><p><</p> Return to Cart</Link>
                            <Button :is-link="true" :url="{path: route('checkout')}"  fill="secondary" textColor="white" :rounded="true" class="text-sm md:text-md">Continue to payment</Button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </BaseLayout>
</template>

<script setup>

import BaseLayout from "../../Layouts/BaseLayout.vue";
import InputField from "../../Components/InputField.vue";
import {Link, useForm, usePage} from "@inertiajs/vue3";
import Button from "../../Components/Button.vue";
import {computed, ref} from "vue";

const props = defineProps({
    cartItems: Array,
    count: Number,
});

const subtotal = computed(() => {
    return Object.values(props.cartItems).reduce((sum, item) => {
        return sum + (item.price * item.qty);
    }, 0);
});

const shipping = ref(0)
const total = computed(() => {
    return subtotal.value + shipping.value;
});

const page = usePage();

const form = useForm({
    email: '',
    first_name: '',
    last_name: '',
    country: '',
    address: '',
    apartment: '',
    city: '',
    province: '',
    postal_code: '',
    phone: ''
})
</script>

<style scoped>

</style>
