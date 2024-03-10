<template>
    <NavUser>
        <div class="col-lg-9 col-md-8 col-12">
            <div class="py-6 p-md-6 p-lg-10">
                <!-- heading -->
                <h2 class="mb-6">My Orders</h2>

                <div class="border-0">
                    <!-- Table -->
                    <table
                        class="table order-table mb-0 text-nowrap table-centered"
                    >
                        <!-- Table Head -->
                        <thead class="bg-light">
                            <tr>
                                <th>Product</th>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Items</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="order in orders" :key="order.id">
                                <td class="align-middle border-top-0">
                                    <a
                                        href="#"
                                        class="fw-semi-bold text-inherit"
                                    >
                                        <h6 class="mb-0">{{ order.id }}</h6>
                                    </a>
                                </td>
                                <td class="align-middle border-top-0">
                                    <a href="#" class="text-inherit"
                                        >#{{ order.trackingId }}</a
                                    >
                                </td>
                                <td class="align-middle border-top-0">
                                    {{ order.created_at }}
                                </td>
                                <td class="align-middle border-top-0">1</td>
                                <td class="align-middle border-top-0">
                                    <span class="badge bg-warning">{{
                                        order.status
                                    }}</span>
                                </td>
                                <td class="align-middle border-top-0">
                                    ${{ order.total }}
                                </td>
                                <td
                                    class="text-muted align-middle border-top-0"
                                >
                                    <Link
                                        class="text-inherit"
                                        :href="'/profile/MyOrders/' + order.id"
                                    >
                                        <ion-icon
                                            name="eye-outline"
                                            role="img"
                                            class="md hydrated"
                                            aria-label="eye outline"
                                        ></ion-icon>
                                    </Link>
                                </td>
                                <!-- <td class="text-muted">
                                    <button
                                        type="submit"
                                        data-order-id="28"
                                        id="cancel_order"
                                        class="cancel_order"
                                    ></button>
                                </td> -->
                            </tr>
                            <!-- Table body -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </NavUser>
</template>

<script setup>
import NavUser from "../Profile/Partials/NavUser.vue";
import { Link, usePage, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const { orders } = defineProps({
    orders: { type: Object, required: true },
});
</script>

<script>
import layout from "../UserLayout/Layout.vue";
export default {
    layout: layout,
};
</script>

<style scope>
@import url("../../../../public/assets/css/theme.min.css");
</style>
