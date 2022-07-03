<template>
  <div v-if="links.length">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, k) in links" :key="k">
        <div v-if="link.url === null"  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
        <Link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-blue-700 text-white': link.active }" :href="link.url" v-html="link.label" ></Link>
      </template>
    </div>
  </div>
</template>
  
<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
</script>
<script>
import Layout from '../Pages/Default/Layout.vue';
import moment from 'moment';
import Pagination from '@/Components/Pagination'
export default {
    props: [ 'links'],
}
</script>