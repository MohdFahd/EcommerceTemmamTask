<template>
    <div v-for="item in category" :key="item">
        {{ item }}
    </div>
</template>

<script>
export default {
    props: {
        category: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style></style>
