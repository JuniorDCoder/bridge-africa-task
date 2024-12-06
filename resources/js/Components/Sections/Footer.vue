<template>
    <div class="bg-[#333333] w-full p-7 lg:p-12 lg:flex text-[#F0F0F0] flex lg:flex-row gap-6 flex-col justify-between">
        <div class="flex flex-col gap-4">

            <div class="flex flex-col gap-4">
                <h3 class="text-xl font-semibold">About</h3>
                <p class="text-sm leading-6 lg:w-1/2">At BrigdeAfrica, we are bring innovative gadgets to your doorstep</p>
            </div>
            <div class="flex flex-col gap-4">
                <h3 class="text-xl font-semibold">More</h3>
                <Link>Privacy</Link>
                <Link>Return Policy</Link>
                <Link>Terms of Service</Link>
            </div>
        </div>
        <div class="flex flex-col gap-4">

            <div class="flex flex-col gap-4">
                <h3 class="text-xl font-semibold">Quick Links</h3>
                <div class="flex flex-col gap-4">
                    <Link>Support</Link>
                    <Link>Home</Link>
                    <Link>Shop</Link>
                    <Link>My Account</Link>
                </div>
            </div>

        </div>
        <div class="flex flex-col gap-4">
            <div class="flex flex-col gap-4">
                <h3 class="text-xl font-semibold">Join the community</h3>
                <p class="text-sm leading-6">Learn about new products and discounts</p>
            </div>
            <div class="flex flex-row gap-4">

                <Link>Privacy</Link>
                <Link>Return Policy</Link>
                <Link>Terms of Service</Link>
            </div>
        </div>

    </div>
    <p class="bg-[#333333] text-[#F0F0F0] text-center py-3 mt-[-3]">
        ©{{ new Date().getFullYear() }} BridgeAfrica Test Site. All Rights Reserved.
    </p>

</template>

<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<style lang="scss" scoped>

</style>
