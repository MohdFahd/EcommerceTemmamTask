<template>
    <a href="#" class="banner-btn">{{ text }}</a>
</template>

<script>
export default {
    props: {
        text: {
            type: String,
            default: "Shop Now",
        },
    },
};
</script>

<style></style>
