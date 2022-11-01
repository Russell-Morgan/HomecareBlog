<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps(['post']);

const initialTitle = props.post.title;

const form = useForm({
    title: props.post.title,
    author: props.post.author,
    body: props.post.body
});


</script>

<template>

    <Head title="Edit Post" />

    <Layout>
        <h1>Edit post: {{ initialTitle }}</h1>
        <form @submit.prevent="form.put(route('posts.update', post.id), { onSuccess: () => form.reset() })"
            class="postForm" enctype="multipart/form-data">
            <input class="postInput" type="text" placeholder="Title" v-model="form.title" required />
            <input class="postInput" type="text" placeholder="Author name" v-model="form.author" required />
            <textarea class="postInput" placeholder="Start typing" rows="8" v-model="form.body" maxlength="999"
                required />
            <div>
                <Link as="button" class="primaryButton" method="delete" :href="route('posts.destroy', post.id)">
                Delete
                </Link>
                <button class="primaryButton" type="submit">Update</button>
            </div>
        </form>
    </Layout>
</template>