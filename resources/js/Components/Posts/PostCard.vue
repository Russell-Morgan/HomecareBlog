<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['post']);

const date = new Date(props.post.created_at);
const months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.",
    "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."
]
</script>
 
<template>
    <div class="postCard">
        <img :src="'storage/post/' + post.file_path" />
        <div>
            <h2>{{ post.title }}</h2>
            <small>
                {{ months[date.getMonth()] }} {{ date.getDate() }}, {{ date.getFullYear() }} | {{ post.author }}
            </small>
            <p class="postCardBody">{{ post.body }}</p>
            <Link id="readMoreLink" class="linkActionButton" :href="route('posts.show', post.id)">Read more</Link>
        </div>
    </div>
</template>