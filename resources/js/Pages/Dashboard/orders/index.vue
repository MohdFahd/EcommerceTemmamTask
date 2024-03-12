<template>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-between">
                        <h6>Orders table</h6>
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
                                            Order Number
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            User
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Date
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Total
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="order in orders.data"
                                        :key="order.id"
                                    >
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold"
                                                    >{{
                                                        order.trackingId
                                                    }}</span
                                                >
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold"
                                                >{{ order.userName }}</span
                                            >
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold"
                                                >{{ order.created_at }}</span
                                            >
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold"
                                                >${{ order.price }}</span
                                            >
                                        </td>
                                        <td
                                            class="align-middle text-center text-sm"
                                        >
                                            <span
                                                class="badge badge-sm bg-gradient-warning"
                                                v-if="order.status == 'Pending'"
                                            >
                                                pending
                                            </span>
                                            <span
                                                class="badge badge-sm bg-gradient-success"
                                                v-if="
                                                    order.status == 'Delivered'
                                                "
                                            >
                                                Delivered
                                            </span>
                                            <span
                                                class="badge badge-sm bg-gradient-danger"
                                                v-if="order.status == 'Cancel'"
                                            >
                                                Cancel
                                            </span>
                                        </td>

                                        <td class="align-middle">
                                            <Link
                                                :href="
                                                    '/admin/orders/' +
                                                    order.id +
                                                    '/edit'
                                                "
                                                class="text-secondary font-weight-bold text-xs"
                                            >
                                                <svg
                                                    width="20px"
                                                    class="svg-inline--fa fa-pen-to-square"
                                                    style="color: #629e61"
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    data-prefix="far"
                                                    data-icon="pen-to-square"
                                                    role="img"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512"
                                                    data-fa-i2svg=""
                                                >
                                                    <path
                                                        fill="currentColor"
                                                        d="M373.1 24.97C401.2-3.147 446.8-3.147 474.9 24.97L487 37.09C515.1 65.21 515.1 110.8 487 138.9L289.8 336.2C281.1 344.8 270.4 351.1 258.6 354.5L158.6 383.1C150.2 385.5 141.2 383.1 135 376.1C128.9 370.8 126.5 361.8 128.9 353.4L157.5 253.4C160.9 241.6 167.2 230.9 175.8 222.2L373.1 24.97zM440.1 58.91C431.6 49.54 416.4 49.54 407 58.91L377.9 88L424 134.1L453.1 104.1C462.5 95.6 462.5 80.4 453.1 71.03L440.1 58.91zM203.7 266.6L186.9 325.1L245.4 308.3C249.4 307.2 252.9 305.1 255.8 302.2L390.1 168L344 121.9L209.8 256.2C206.9 259.1 204.8 262.6 203.7 266.6zM200 64C213.3 64 224 74.75 224 88C224 101.3 213.3 112 200 112H88C65.91 112 48 129.9 48 152V424C48 446.1 65.91 464 88 464H360C382.1 464 400 446.1 400 424V312C400 298.7 410.7 288 424 288C437.3 288 448 298.7 448 312V424C448 472.6 408.6 512 360 512H88C39.4 512 0 472.6 0 424V152C0 103.4 39.4 64 88 64H200z"
                                                    ></path>
                                                </svg>
                                            </Link>
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
                                                orders.current_page > 1
                                                    ? true
                                                    : false
                                            "
                                            :href="
                                                '/admin/orders?page=' +
                                                Math.max(
                                                    orders.current_page - 1,
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
                                        ) in orders.links.slice(1, -1)"
                                        :key="index"
                                        class="block size-8 rounded border-blue-600 text-center leading-8 text-white"
                                        :href="
                                            '/admin/orders?page=' +
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
                                                orders.current_page <
                                                orders.last_page
                                                    ? true
                                                    : false
                                            "
                                            :href="
                                                '/admin/orders?page=' +
                                                Math.min(
                                                    orders.current_page + 1,
                                                    orders.last_page
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
const { orders } = defineProps({
    // ProductData: { type: Object, required: true },
    orders: { type: Object, required: true },
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
            router.delete(`/admin/orders/${productID}`, {
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
        orders: Object,
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
                "/admin/orders",
                { search: value },
                { preserveState: true, replace: true }
            );
        },
    },
    components: { Link },
};
</script>

<style></style>
