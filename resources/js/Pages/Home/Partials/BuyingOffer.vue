<template>
    <div class="showcase-container">
        <div class="showcase">
            <div class="showcase-banner">
                <img
                    src="assets/images/products/shampoo.jpg"
                    alt="shampoo, conditioner & facewash packs"
                    class="showcase-img"
                />
            </div>

            <div class="showcase-content">
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>

                <a href="#">
                    <h3 class="showcase-title">
                        {{ data.product.name }}
                    </h3>
                </a>

                <p class="showcase-desc">
                    {{ data.description }}
                </p>

                <div class="price-box">
                    <p class="price">${{ data.product.new_price }}</p>

                    <del>$ {{ data.product.old_price }} </del>
                </div>

                <button class="add-cart-btn">add to cart</button>

                <div class="showcase-status">
                    <div class="wrapper">
                        <p>already sold: <b>20</b></p>

                        <p>
                            available: <b> {{ data.product.quantity }} </b>
                        </p>
                    </div>

                    <div class="showcase-status-bar"></div>
                </div>

                <div class="countdown-box">
                    <p class="countdown-desc">Hurry Up! Offer ends in:</p>

                    <div class="countdown">
                        <div class="countdown-content">
                            <p class="display-number">360</p>

                            <p class="display-text">Days</p>
                        </div>

                        <div class="countdown-content">
                            <p class="display-number">24</p>
                            <p class="display-text">Hours</p>
                        </div>

                        <div class="countdown-content">
                            <p class="display-number">59</p>
                            <p class="display-text">Min</p>
                        </div>

                        <div class="countdown-content">
                            <p class="display-number">00</p>
                            <p class="display-text">Sec</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        data: {
            type: Object,
        },
    },
};
</script>

<style></style>
