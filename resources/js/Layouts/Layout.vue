<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="navBar">
        <Link :href="route('home')">
        Home
        </Link>
        <Link :href="route('create')">
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