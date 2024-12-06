<template>
    <!-- Country selector section -->
    <div v-if="isSelectCountry && isWelcomeRoute" class="flex flex-col justify-center w-full gap-4 px-4 py-4 bg-primary-dark md:items-center md md:flex-row lg:gap-7 lg:px-auto">
        <div class="flex justify-between">
            <h3 class="text-primary-text">Select your country or region</h3>
            <button @click="toggleSelectCountry" class="lg:hidden">
                <img src="../../assets/icons/close.png" alt="Close" class="w-[16px] h-[16px]" />
            </button>
        </div>
        <select
            class="p-3 text-primary-text rounded-md appearance-none bg-no-repeat bg-right pr-[20%]"
            style="background-image: url('data:image/svg+xml;utf8,<svg fill=\'%23000000\' height=\'24\' viewBox=\'0 0 24 24\' width=\'24\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>');">
            <option>Select Country</option>
        </select>
    </div>

    <!-- Navbar section for both mobile and desktop -->
    <div class="flex items-center justify-between w-full px-4 py-3 bg-white lg:hidden">
        <!-- Menu Icon on Mobile -->
        <button @click="toggleMenu" class="flex items-center lg:hidden">
            <img src="../../assets/icons/menu.png" alt="Menu" class="w-[24px] h-[24px]" />
        </button>



        <!-- Cart and Search Icons on the right -->
        <div class="flex space-x-4">
            <Link :href="route('welcome')">
                <img src="../../assets/icons/search.png" alt="Search" class="w-[24px] h-[24px]" />
            </Link>

        </div>
    </div>

    <!-- Mobile Menu -->
    <transition name="slide-fade">
        <div v-if="isMenuOpen" class="fixed inset-0 z-50 flex backdrop-blur-md">
            <div class="w-[70%] bg-primary p-6 h-full">
                <!-- Close button -->
                <button @click="toggleMenu" class="absolute top-4 right-4">
                    <img src="../../assets/icons/close.png" alt="Close" class="w-[24px] h-[24px]" />
                </button>

                <!-- Mobile Menu Items aligned to the left -->
                <nav class="flex flex-col mt-10 space-y-4 text-left">
                    <NewNavLink :is-active="route().current('welcome')" :route="route('welcome')" text="Home" />
                    <NewNavLink :is-active="route().current('shop')" :route="route('shop')" text="Shop" />
                    <NewNavLink :route="route('dashboard')" text="My Account" :is-active="route().current('dashboard')"/>
                    <NewNavLink :route="route('welcome')" text="Support" :is-active=false />
                </nav>
            </div>

            <!-- Invisible section to close menu when clicked outside -->
            <div @click="toggleMenu" class="w-[30%] h-full"></div>
        </div>
    </transition>

    <!-- Desktop Navigation (hidden on mobile) -->
    <div class="items-center justify-center hidden w-full py-3 mx-auto space-x-12 bg-white lg:flex">

        <NewNavLink :is-active="route().current('welcome')" :route="route('welcome')" text="Home" />
        <NewNavLink :is-active="route().current('shop')" :route="route('shop')" text="Shop" />
        <NewNavLink :route="route('dashboard')" text="My account" :is-active="route().current('dashboard')" />
        <NewNavLink :route="route('welcome')" text="Support" :is-active=false />
        <Link :href="route('welcome')">
            <img src="../../assets/icons/profile.png" alt="Profile" class="w-[20px] h-[20px]" />
        </Link>
        <Link :href="route('welcome')">
            <img src="../../assets/icons/search.png" alt="Search" class="w-[20px] h-[20px]" />
        </Link>

    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import NewNavLink from "../NewNavLink.vue";
const isSelectCountry = ref(true);
const url = usePage()
const isWelcomeRoute = computed(() => {
    console.log(url)
    return url === '/';
});


// Reactive state for menu toggle
const isMenuOpen = ref(false);

// Function to toggle the mobile menu
const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const toggleSelectCountry = () => {
    isSelectCountry.value = false;
};
</script>

<style scoped>
/* Add smooth slide-in and fade-in effect for the mobile menu */
.slide-fade-enter-active, .slide-fade-leave-active {
    transition: all 0.3s ease;
}
.slide-fade-enter-from, .slide-fade-leave-to {
    opacity: 0;
    transform: translateX(-100%);
}

/* Custom styles for mobile menu */
.backdrop-blur-md {
    backdrop-filter: blur(10px);
}
</style>
