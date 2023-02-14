<script setup>
import axios from 'axios'
import { onMounted, ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const props = defineProps({
  passedProduct: Number,
})

const selectedProduct = ref({})
const notes = ref('')
const products = ref({})
const success = ref(false)

const placeOrder = async () => {
  const { data } = await axios.post('/api/order', {
    notes: notes.value,
    product_id: selectedProduct.value.id,
  })

  success.value = true

  window.location.href = `/success-order/${data.data.id}`
}

const fetchProducts = async () => {
  const { data } = await axios.get('/api/products')

  products.value = data.data

  selectedProduct.value = products.value.find((element) => {
    return element.id === props.passedProduct
  })
}

onMounted(() => {
  fetchProducts()
})
</script>

<template>
  <AuthenticatedLayout>
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="shadow sm:overflow-hidden sm:rounded-md max-w-xl mx-auto">
        <div class="space-y-6 bg-white py-6 px-4 sm:p-6">
          <div class="flex justify-between">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Add Order
            </h3>
            <div>
              <Transition
                enter-from-class="opacity-0"
                leave-to-class="opacity-0"
                class="transition ease-in-out"
              >
                <p
                  v-if="success"
                  class="text-sm text-gray-600"
                >
                  Order Placed.
                </p>
              </Transition>
            </div>
          </div>
          <div class="flex flex-col">
            <div class="col-span-3">
              <label
                for="notes"
                class="block text-sm font-medium text-gray-700 font-semibold"
              >Notes</label>
              <div class="mt-1">
                <textarea
                  id="notes"
                  v-model="notes"
                  name="notes"
                  rows="3"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                  placeholder="Notes for the order"
                />
              </div>
            </div>

            <div class="col-span-6 sm:col-span-3 mt-3">
              <label
                for="products"
                class="block text-sm font-medium text-gray-700 font-semibold"
              >Product</label>
              <select
                id="products"
                v-model="selectedProduct"
                name="products"
                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              >
                <option
                  v-for="product in products"
                  :key="product.id"
                  :value="product"
                  @click="handleProduct"
                >
                  {{ `${product.name} ($${product.price.toFixed(2)})` }}
                </option>
              </select>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
          <button
            type="submit"
            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            @click="placeOrder"
          >
            Place
          </button>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
