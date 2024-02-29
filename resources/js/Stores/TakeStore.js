import { defineStore } from "pinia";

export const useTakeStore = defineStore({
    id: "take", // Store ID
    state: () => ({
        categories: [], // Initialize categories state
    }),
    actions: {
        // Set categories data
        setCategories(categories) {
            this.categories = categories;
        },
    },
});
