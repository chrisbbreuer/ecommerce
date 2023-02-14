<script setup>
import axios from 'axios'
import { onMounted, ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import ShoppingCartIcon from '@/Icons/ShoppingCartIcon.vue'
import ShoppingBagIcon from '@/Icons/ShoppingBagIcon.vue'

const products = ref({})

const fetchProducts = async () => {
  const { data } = await axios.get('/api/products')

  products.value = data.data
}

onMounted(() => {
  fetchProducts()
})
</script>

<template>
  <AuthenticatedLayout>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-xl font-semibold text-gray-900">
            Products
          </h1>
        </div>
      </div>
      <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
              <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                  <tr>
                    <th
                      scope="col"
                      class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                    >
                      ID
                    </th>
                    <th
                      scope="col"
                      class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                      Name
                    </th>
                    <th
                      scope="col"
                      class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                      Price
                    </th>
                    <th />
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                  <tr
                    v-for="product in products"
                    :key="product.id"
                  >
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                      {{ product.id }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">
                      <div class="flex items-center">
                        <div class="border border-gray-300 rounded-full p-2 mr-2">
                          <ShoppingBagIcon />
                        </div>
                        <div>
                          <div>{{ product.name }}</div>
                          <div class="text-sm text-gray-400">
                            {{ product.description }}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                      {{ `$${product.price.toFixed(2)}` }}
                    </td>
                    <td class="text-white">
                      <Link
                        href="/order"
                        :data="{
                          passedProduct: product.id,
                        }"
                      >
                        <button
                          class="flex items-center border border-indigo-300 rounded px-2 py-1.5 bg-indigo-500 hover:opacity-75"
                          @click="placeOrder"
                        >
                          <ShoppingCartIcon />
                          <span class="text-sm ml-2">Purchase</span>
                        </button>
                      </Link>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
