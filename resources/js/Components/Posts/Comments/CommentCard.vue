<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['comment']);

const date = new Date(props.comment.created_at);
const months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.",
    "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."
]
</script>
 
<template>
    <div class="commentCard">
        <p>{{ comment.body }}</p>
        <small>
            {{ months[date.getMonth()] }} {{ date.getDate() }}, {{ date.getFullYear() }}
        </small>
    </div>
</template>