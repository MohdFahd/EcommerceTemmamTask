<template>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-between">
                        <h6>Products table</h6>
                        <div>
                            <Link
                                href="/admin/products/create"
                                class="btn btnnew btn-warning text-dark mx-3"
                            >
                                New
                            </Link>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <input
                                v-model="search"
                                type="text"
                                placeholder="Search..."
                                width="35%"
                                style="
                                    border: none;
                                    border-bottom: 1px solid black;
                                "
                            />
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Product
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Category
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Price
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            quantity
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Status
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Created at
                                        </th>
                                        <th
                                            class="text-secondary opacity-7"
                                        ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="product in products.data"
                                        :key="product.id"
                                    >
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img
                                                        :src="product.img"
                                                        class="avatar avatar-sm me-3"
                                                        alt="user1"
                                                    />
                                                </div>
                                                <div
                                                    class="d-flex flex-column justify-content-center"
                                                >
                                                    <h6 class="mb-0 text-sm">
                                                        {{ product.name }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold"
                                                >{{ product.category }}</span
                                            >
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold"
                                                >{{ product.new_price }}</span
                                            >
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold"
                                                >{{ product.quantity }}</span
                                            >
                                        </td>
                                        <td
                                            class="align-middle text-center text-sm"
                                        >
                                            <span
                                                class="badge badge-sm bg-gradient-success"
                                                v-if="product.status == 0"
                                            >
                                                active
                                            </span>
                                            <span
                                                class="badge badge-sm bg-gradient-danger"
                                                v-else
                                            >
                                                inactive
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold"
                                                >{{ product.created_at }}</span
                                            >
                                        </td>
                                        <td class="align-middle">
                                            <Link
                                                :href="
                                                    '/admin/products/' +
                                                    product.id +
                                                    '/edit'
                                                "
                                                class="text-secondary font-weight-bold text-xs"
                                            >
                                                Edit
                                            </Link>
                                        </td>
                                        <td class="align-middle">
                                            <button
                                                class="text-secondary font-weight-bold text-xs"
                                                @click="
                                                    removeProduct(product.id)
                                                "
                                                data-toggle="tooltip"
                                                data-original-title="Edit user"
                                            >
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div
                                class="rounded-b-lg border-t border-gray-200 px-4 py-2"
                            >
                                <ol
                                    class="flex justify-end gap-1 text-xs font-medium"
                                >
                                    <li>
                                        <Link
                                            v-show="
                                                products.current_page > 1
                                                    ? true
                                                    : false
                                            "
                                            :href="
                                                '/admin/products?page=' +
                                                Math.max(
                                                    products.current_page - 1,
                                                    1
                                                ) +
                                                ''
                                            "
                                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180"
                                        >
                                            <span class="sr-only"
                                                >Prev Page</span
                                            >
                                            Prv
                                        </Link>
                                    </li>

                                    <Link
                                        v-for="(
                                            link, index
                                        ) in products.links.slice(1, -1)"
                                        :key="index"
                                        class="block size-8 rounded border-blue-600 text-center leading-8 text-white"
                                        :href="
                                            '/admin/products?page=' +
                                            link.label +
                                            ''
                                        "
                                        :class="{
                                            'bg-blue-600': link.active,
                                            'bg-gray-600': !link.active,
                                        }"
                                    >
                                        {{ link.label }}</Link
                                    >

                                    <li>
                                        <Link
                                            v-show="
                                                products.current_page <
                                                products.last_page
                                                    ? true
                                                    : false
                                            "
                                            :href="
                                                '/admin/products?page=' +
                                                Math.min(
                                                    products.current_page + 1,
                                                    products.last_page
                                                ) +
                                                ''
                                            "
                                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180"
                                        >
                                            <span class="sr-only"
                                                >Next Page</span
                                            >
                                            Next
                                        </Link>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
    </div>
</template>

<script setup>
import Swal from "sweetalert2";
const { products } = defineProps({
    // ProductData: { type: Object, required: true },
    products: { type: Object, required: true },
    filters: { type: Object, required: true },
});
const removeProduct = (productID) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(`/admin/products/${productID}`, {
                onSuccess: (page) => {
                    if (page.props.flash.message) {
                        Swal.fire(
                            "Deleted!",
                            page.props.flash.message,
                            "success"
                        );
                    }
                },
                preserveScroll: true,
                preserveState: false,
            });
        }
    });
};
</script>
<script>
import layout from "../../AdminLayout/layout.vue";
import { Link, router } from "@inertiajs/vue3";
import { ref, watch } from "vue";
export default {
    layout: layout,
    props: {
        products: Object,
        filters: Object,
        can: Object,
    },
    data() {
        return {
            search: this.filters.search || "",
        };
    },
    watch: {
        search(value) {
            console.log("Search value changed:", value); // Check if this logs properly
            this.$inertia.get(
                "/admin/products",
                { search: value },
                { preserveState: true, replace: true }
            );
        },
    },
    components: { Link },
};
</script>

<style></style>
