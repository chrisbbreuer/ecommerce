<script setup>
import { Link } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

defineProps({
  id: Number,
})
</script>

<template>
  <AuthenticatedLayout>
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 text-center">
      <div class="flex justify-center">
        <svg
          color="#22c55e"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1"
          stroke="currentColor"
          class="w-40 h-40"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </div>
      <div class="text-3xl">
        Woohoo!
      </div>
      <div class="mt-5 text-gray-800">
        {{ `Your order (#${id}) has been placed.` }}
      </div>

      <div class="mt-5 text-gray-600">
        Pull up a chair, sit back and relax as your order is on its way to you!
      </div>
      <div class="mt-8">
        <Link
          class="px-2 py-1.5 bg-indigo-500 text-white rounded hover:opacity-75 border border-indigo-200"
          :href="route('orders')"
        >
          Back to Orders
        </Link>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
