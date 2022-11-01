<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="navBar">
        <Link id="homeLink" :href="route('posts.index')">
        Home
        </Link>
        <Link :href="route('posts.create')">
        <button class="primaryButton">
            New post
        </button>
        </Link>
    </div>
    <div class="pageLayout">
        <div class="pageActions">
            <slot name="actions" />
        </div>
        <div class="pageContent">
            <slot />
        </div>
    </div>
</template>