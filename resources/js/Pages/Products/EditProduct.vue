<template>
    <Head title="Edit Product" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Edit Product
                    </div>
                </div>
            </div>
        </div>

      <div class="flex flex-col gap-6 py-12 md:flex-row md:gap-12">
        <!-- Product Image Section -->
        <div class="flex flex-col items-center w-full md:w-1/2">
          <img :src="`/storage/` + product.image" alt="Product" class="w-[300px] mb-4">
          <div class="flex gap-3 mt-4 md:gap-5">
            <img v-for="image in product.images" :key="image.id" :src="`/storage/` + image.image_path" alt="Product Image" class="md:w-[100px] w-[85px] md:h-[100px] object-cover">
          </div>
        </div>
        <!-- Product Form Section -->
        <div class="flex flex-col w-full gap-6 md:w-1/2">
          <h1 class="text-2xl font-semibold text-primary-text">Edit Product: {{ product.name }}</h1>

          <form @submit.prevent="updateProduct" class="space-y-4">
            <!-- Product Name -->
            <div>
              <InputLabel for="name" label="Product Name" />
              <TextInput v-model="form.name" id="name" type="text" />
              <InputError :message="form.errors.name" />
            </div>

            <!-- Description -->
            <div>
              <InputLabel for="description" label="Description" />
              <textarea v-model="form.description" id="description" rows="4" class="w-full p-2 border border-gray-300 rounded-md"></textarea>
              <InputError :message="form.errors.description" />
            </div>

            <!-- Price -->
            <div>
              <InputLabel for="price" label="Price (€)" />
              <TextInput v-model="form.price" id="price" type="number" />
              <InputError :message="form.errors.price" />
            </div>

            <!-- Giveaway Price -->
            <div>
              <InputLabel for="giveaway_price" label="Giveaway Price (Optional)" />
              <TextInput v-model="form.giveaway_price" id="giveaway_price" type="number" />
              <InputError :message="form.errors.giveaway_price" />
            </div>

            <!-- Category -->
            <div>
              <InputLabel for="category_id" label="Category" />
              <select v-model="form.category_id" id="category_id" class="w-full p-2 border border-gray-300 rounded-md">
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
              </select>
              <InputError :message="form.errors.category_id" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center gap-4">
              <Button type="submit" fill="secondary" textColor="white">Update Product</Button>
              <Link :href="route('my-products')" class="text-secondary">Cancel</Link>
            </div>
          </form>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import { useForm } from '@inertiajs/vue3';
  import { ref, onMounted } from 'vue';
  import AuthenticatedLayout from '@//Layouts/AuthenticatedLayout.vue';
  import Button from '@/Components/Button.vue';
  import { Head, Link } from '@inertiajs/vue3';
  import InputLabel from '@/Components/InputLabel.vue';
  import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import { toast } from 'vue3-toastify'

  const props = defineProps({
    product: Object,
    categories: Array
  });

  const form = useForm({
    name: props.product.name,
    description: props.product.description,
    price: props.product.price,
    giveaway_price: props.product.giveaway_price,
    category_id: props.product.category_id
  });

  const updateProduct = () => {
    form.put(route('product.update', props.product.id), {
      onSuccess: () => {
        toast.success('Product updated successfully');
      }
    });
  };
  </script>

  <style scoped>
  /* Add your custom styles here */
  </style>
