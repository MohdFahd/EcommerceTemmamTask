<template>
    {{ favorites }}
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const favorites = computed(() => usePage().props.favUser);
</script>
<style></style>
