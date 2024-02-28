<template>
    <img
        :src="'assets/images/' + src"
        :alt="alt"
        :width="width"
        :height="height"
        :class="classes"
    />
</template>

<script>
export default {
    props: {
        src: {
            type: String,
            default: "",
        },
        alt: {
            type: String,
            default: "",
        },
        width: {
            type: String,
            default: "20",
        },
        height: {
            type: String,
            default: "20",
        },
        classes: {
            type: String,
            default: "",
        },
    },
};
</script>

<style></style>
