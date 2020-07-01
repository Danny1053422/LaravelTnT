<template>
    <div class="d-flex">
        <i
            class="fas fa-star"
            v-for="(star, index) in fullStars"
            :key="'full' + index"
        ></i>
        <i class="fas fa-star-half-alt" v-if="halfStar"></i>
        <i
            class="far fa-star"
            v-for="(star, index) in emptyStars"
            :key="'empty' + index"
        ></i>
    </div>
</template>
<script>
export default {
    props: {
        rating: Number
    },
    computed: {
        halfStar() {
            // 3.4 fraction = 40
            const fraction = Math.round(
                (this.rating - Math.floor(this.rating)) * 100
            );
            return fraction > 0 && fraction < 50;
        },
        fullStars() {
            return Math.round(this.rating); // 4捨5入
        },
        emptyStars() {
            // if rating = 1.9, ceil(1.9) = 2, 5-2 = 3, render 3 empty stars
            return 5 - Math.ceil(this.rating);
        }
    },
};
</script>
