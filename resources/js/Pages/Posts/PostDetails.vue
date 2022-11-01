<script setup>
import CommentCard from '@/Components/Posts/Comments/CommentCard.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps(['post', 'comments']);

console.log('comments: ', props.comments);

const date = new Date(props.post.created_at);
const months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.",
    "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."
]

const form = useForm({
    body: '',
    post_id: props.post.id
});
</script>


<template>

    <Head :title="post.title" />

    <Layout>
        <template #actions>
            <Link id="backFromDetails" class="linkActionButton" :href="route('posts.index')">Back</Link>
        </template>

        <h1>{{ post.title }}</h1>
        <small>
            {{ months[date.getMonth()] }} {{ date.getDate() }}, {{ date.getFullYear() }} | {{ post.author }}
        </small>
        <img class="postDetailsImage" :src="'../storage/post/' + post.file_path" />
        <p>{{ post.body }}</p>
        <Link class="linkActionButton" id="editPostLink" :href="route('posts.edit', post.id)">Edit</Link>
        <hr class="commentDivider" />
        <CommentCard v-for="comment in comments" :key="comment.id" :comment="comment" />
        <form @submit.prevent="form.post(
            route('comments.store'),
            { onSuccess: () => form.reset() }
        )" class="postForm">
            <textarea class="postInput" placeholder="Write a comment" rows="4" v-model="form.body" maxlength="255"
                required />
            <button class="primaryButton createButton" type="submit">Add comment</button>
        </form>
    </Layout>
</template>