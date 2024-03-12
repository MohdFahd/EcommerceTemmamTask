<template>
    <div class="container my-2">
        <div
            class="alert alert-warning"
            v-if="order.status == 'Completed'"
            role="alert"
        >
            Yapiiiiiiii! 🎉 Your order has been delivered and is now in your
            hands.
        </div>
        <main>
            <div class="row justify-content-between">
                <div class="card text-center mx-1 col">
                    <img
                        class="card-img-top"
                        src="holder.js/100px180/"
                        alt=""
                    />
                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            Tracking:<span class="text-primary"
                                >#{{ order.trackingId }}</span
                            >
                        </h5>
                    </div>
                </div>
                <div class="card text-center mx-1 col">
                    <img
                        class="card-img-top"
                        src="holder.js/100px180/"
                        alt=""
                    />
                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            Status:
                            <span class="text-primary">{{ order.status }}</span>
                        </h5>
                    </div>
                </div>
                <div class="card text-center mx-1 col">
                    <img
                        class="card-img-top"
                        src="holder.js/100px180/"
                        alt=""
                    />
                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            Expected date:
                            <span class="text-primary">October 15, 2023</span>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="track">
                <div
                    class="step"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="View"
                    :class="{ active: order.tracking_mode >= 1 }"
                >
                    <span class="icon">
                        <svg
                            class="svg-inline--fa fa-check fa-1x"
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="check"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                            data-fa-i2svg=""
                        >
                            <path
                                fill="currentColor"
                                d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                            ></path>
                        </svg>
                    </span>
                    <span class="text my-3 active">Order confirmed</span>

                    <div class="tooltip">Order confirmed on [date]</div>
                </div>
                <div
                    class="step"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="View"
                    :class="{ active: order.tracking_mode >= 2 }"
                >
                    <span class="icon">
                        <svg
                            class="svg-inline--fa fa-user"
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="user"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                            data-fa-i2svg=""
                        >
                            <path
                                fill="currentColor"
                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"
                            ></path>
                        </svg>
                    </span>
                    <span class="text my-3"> Picked by courier</span>
                    <div class="tooltip">Order confirmed on [date]</div>
                </div>
                <div class="step" :class="{ active: order.tracking_mode >= 3 }">
                    <span class="icon">
                        <svg
                            class="svg-inline--fa fa-truck"
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="truck"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512"
                            data-fa-i2svg=""
                        >
                            <path
                                fill="currentColor"
                                d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM208 416c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zm272 48c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48z"
                            ></path>
                        </svg>
                    </span>
                    <span class="text my-3"> On the way </span>
                </div>
                <div class="step" :class="{ active: order.tracking_mode >= 4 }">
                    <span class="icon">
                        <svg
                            class="svg-inline--fa fa-box"
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="box"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                            data-fa-i2svg=""
                        >
                            <path
                                fill="currentColor"
                                d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z"
                            ></path>
                        </svg>
                    </span>
                    <span class="text my-3">Ready for pickup</span>
                </div>
                <div class="step" :class="{ active: order.tracking_mode >= 5 }">
                    <span class="icon"
                        ><svg
                            class="svg-inline--fa fa-face-smile"
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="face-smile"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                            data-fa-i2svg=""
                        >
                            <path
                                fill="currentColor"
                                d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM208.4 208c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm128 32c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z"
                            ></path>
                        </svg>
                    </span>
                    <span class="text my-3">Delivered</span>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <span class="text fs-4">View Order</span>
                            <Link
                                class="btn btn-warning text-light float-end d-flex"
                                href="/profile/MyOrders"
                            >
                                <svg
                                    width="20px"
                                    class="svg-inline--fa fa-reply text-white mx-2"
                                    aria-hidden="true"
                                    focusable="false"
                                    data-prefix="fas"
                                    data-icon="reply"
                                    role="img"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"
                                    data-fa-i2svg=""
                                >
                                    <path
                                        fill="currentColor"
                                        d="M205 34.8c11.5 5.1 19 16.6 19 29.2v64H336c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96H224v64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z"
                                    ></path>
                                </svg>
                                Back
                            </Link>
                        </div>
                        <div class="card-body shadow-sm">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivey View</h4>
                                    <hr />
                                    <div class="col-md-12">
                                        <label class="fw-bold" for=""
                                            >Name</label
                                        >
                                        <div class="border rounded p-2">
                                            {{ order.name }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="fw-bold" for=""
                                            >Address</label
                                        >
                                        <div class="border rounded p-2">
                                            {{ order.address }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="fw-bold" for=""
                                            >Phone</label
                                        >
                                        <div class="border rounded p-2">
                                            {{ order.phone }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="fw-bold" for=""
                                            >tracking_no</label
                                        >
                                        <div class="border rounded p-2">
                                            {{ order.trackingId }}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="fw-bold" for=""
                                            >Date</label
                                        >
                                        <div class="border rounded p-2">
                                            {{ order.created_at }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr />
                                    <!-- <h5 class="px-6 py-4 bg-transparent mb-0">Order Details</h5> -->
                                    <div class="card shadow-sm">
                                        <ul class="list-group list-group-flush">
                                            <!-- list group item -->

                                            <li
                                                class="list-group-item px-4 p-2"
                                                v-for="(
                                                    item, index
                                                ) in order_items"
                                                :key="index"
                                            >
                                                <div
                                                    class="row align-items-center"
                                                    style="padding-right: 12px"
                                                >
                                                    <div class="col-2 col-md-2">
                                                        <img
                                                            :src="item.img"
                                                            alt="16939335803.jpg"
                                                            class="img-fluid"
                                                        />
                                                    </div>
                                                    <div class="col-5 col-md-5">
                                                        <h6 class="mb-0">
                                                            {{ item.name }}
                                                        </h6>
                                                        <span
                                                            ><small
                                                                class="text-muted"
                                                                >.98 / lb</small
                                                            ></span
                                                        >
                                                    </div>
                                                    <div
                                                        class="col-2 col-md-2 text-center text-muted"
                                                    >
                                                        <span>{{
                                                            item.quantity
                                                        }}</span>
                                                    </div>
                                                    <div
                                                        class="col-3 text-lg-end text-start text-md-end col-md-3"
                                                    >
                                                        <span class="fw-bold"
                                                            >${{
                                                                item.price
                                                            }}</span
                                                        >
                                                    </div>
                                                </div>
                                            </li>

                                            <!-- list group item -->
                                            <li
                                                class="list-group-item px-4 py-3"
                                            >
                                                <div
                                                    class="d-flex align-items-center justify-content-between mb-2"
                                                >
                                                    <div>Item Subtotal</div>
                                                    <div class="fw-bold">
                                                        ${{ order.total }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between"
                                                >
                                                    <div>
                                                        Discount
                                                        <i
                                                            class="feather-icon icon-info text-muted"
                                                            data-bs-toggle="tooltip"
                                                            aria-label="Default tooltip"
                                                            data-bs-original-title="Default tooltip"
                                                        ></i>
                                                    </div>
                                                    <div class="fw-bold">
                                                        $19.00
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- list group item -->
                                            <li
                                                class="list-group-item px-4 py-3"
                                            >
                                                <div
                                                    class="d-flex align-items-center justify-content-between fw-bold"
                                                >
                                                    <div>Subtotal</div>
                                                    <div>$29.00</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="border card p-2 my-3">
                                        <!-- <label class="fw-bold" for="">Status</label> -->
                                        <h6 class="fw-bold">Status:</h6>
                                        <span
                                            v-if="order.status == 'Pending'"
                                            class="badge fs-5 p-3 bg-warning"
                                            >{{ order.status }}</span
                                        >
                                        <span
                                            v-if="order.status == 'Completed'"
                                            class="badge fs-5 p-3 bg-success"
                                            >{{ order.status }}</span
                                        >
                                        <span
                                            v-if="order.status == 'Canceled'"
                                            class="badge fs-5 p-3 bg-danger"
                                            >{{ order.status }}</span
                                        >
                                        <!-- <h5><span class="badge bg-warning">Under Processing</span></h5> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";

const { order, order_items } = defineProps({
    order: Object,
    order_items: Array,
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

<style>
.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px;
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative;
}

.track .step.active:before {
    background: #ff5722;
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px;
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff;
}

.step {
    position: relative;
    /* display: flex;
    justify-content: center;
    align-content: center; */
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd;
    /* display: flex;
    justify-content: center;
    align-content: center; */
}
.icon svg {
    width: 70%;
    height: 70%;
    text-align: center;
    position: absolute;
    top: 15%;
    left: 15%;
}
.track .step.active .text {
    font-weight: 400;
    color: #000;
}

.track .text {
    display: block;
    margin-top: 7px;
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
}

.tooltip {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 5px;
    border-radius: 5px;
    display: none;
    z-index: 1;
}

.step:hover .tooltip {
    display: block;
}
</style>
