<script setup>
import Layout from '@/Layouts/Layout.vue';
import PostCard from '@/Components/Posts/PostCard.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps(['posts', 'search']);

const search = ref(props.search);

watch(search, value => {
    Inertia.get('posts', { search: value }, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
    });
});

</script>

<template>

    <Head title="Posts" />

    <Layout>
        <input class="searchBar" type="search" placeholder="Search by author" v-model="search" />
        <PostCard v-for="post in posts" :key="post.id" :post="post" />
    </Layout>
</template>