<template>
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center d-md-none py-4"
                >
                    <!-- heading -->
                    <h3 class="fs-5 mb-0">Account Setting</h3>
                    <!-- button -->
                    <button
                        id="menuButton"
                        class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasAccount"
                        aria-controls="offcanvasAccount"
                    >
                        <ion-icon
                            name="menu-outline"
                            role="img"
                            class="md hydrated"
                            aria-label="menu outline"
                        ></ion-icon>
                    </button>
                </div>
            </div>
            <!-- col -->
            <div class="col-lg-3 col-md-4 col-12 border-end d-none d-md-block">
                <div class="pt-10 pe-lg-10">
                    <!-- nav -->
                    <ul class="nav flex-column nav-pills nav-pills-dark">
                        <!-- nav item -->

                        <li class="nav-item">
                            <Link
                                href="/profile/show"
                                :class="{
                                    active: $page.url.startsWith(
                                        '/profile/show'
                                    ),
                                }"
                                class="nav-link"
                            >
                                <i class="feather-icon icon-settings me-2"></i
                                >Account
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link
                                href="/profile/MyOrders"
                                class="nav-link"
                                :class="{
                                    active: $page.url.startsWith(
                                        '/profile/MyOrders'
                                    ),
                                }"
                            >
                                <i class="feather-icon icon-settings me-2"></i
                                >My Orders</Link
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                aria-current="page"
                                href="./Myorders.php"
                                ><i
                                    class="feather-icon icon-shopping-bag me-2"
                                ></i
                                >My Orders</a
                            >
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="address.php"
                                ><i class="feather-icon icon-map-pin me-2"></i
                                >Address</a
                            >
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="account-payment-method.html"
                                ><i
                                    class="feather-icon icon-credit-card me-2"
                                ></i
                                >Payment Method</a
                            >
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="account-notification.html"
                                ><i class="feather-icon icon-bell me-2"></i
                                >Notification</a
                            >
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <hr />
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import layout from "../../UserLayout/Layout.vue";
import { Link, usePage } from "@inertiajs/vue3";

const user = usePage().props.auth.user;
</script>
<script>
export default {
    layout: layout,
};
</script>

<style scope>
@import url("../../../../../public/assets/css/theme.min.css");
</style>
