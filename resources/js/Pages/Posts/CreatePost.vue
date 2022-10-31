<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    title: '',
    author: '',
    file: null,
    body: ''
});


</script>

<template>

    <Head title="Create Post" />

    <Layout>
        <form @submit.prevent="form.post(route('posts.store'), { onSuccess: () => form.reset() })" class="postForm"
            enctype="multipart/form-data">
            <h1>Create a new post</h1>
            <input class="postInput" type="text" placeholder="Title" v-model="form.title" required />
            <input class="postInput" type="text" placeholder="Author name" v-model="form.author" required />
            <div class="postInput">
                <label>
                    Choose an image for the post
                    <input type="file" placeholder="Choose an image for the post"
                        @input="form.file = $event.target.files[0]" required />
                </label>
            </div>
            <textarea class="postInput" placeholder="Start typing" rows="8" v-model="form.body" maxlength="999" required />
            <button class="primaryButton createButton" type="submit">Create</button>
        </form>
    </Layout>
</template>