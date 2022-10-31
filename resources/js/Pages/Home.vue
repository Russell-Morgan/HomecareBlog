<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>

    <Head title="Home" />

    <Layout>
        <input class="searchBar" type="search" placeholder="Search by author" />
    </Layout>
</template>