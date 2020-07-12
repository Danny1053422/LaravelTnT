<template>
    <div class="d-flex">
        <i
            class="fas fa-star"
            v-for="(star, index) in fullStars"
            :key="'full' + index"
            @mouseover="$emit('input', star)"
        ></i>
        <i class="fas fa-star-half-alt" v-if="halfStar"></i>
        <i
            class="far fa-star"
            v-for="(star, index) in emptyStars"
            :key="'empty' + index"
            @mouseover="$emit('input',fullStars + star)"
        ></i>
    </div>
</template>
<script>
export default {
    props: {
        value: Number
    },
    computed: {
        halfStar() {
            // 3.4 fraction = 40
            const fraction = Math.round(
                (this.value - Math.floor(this.value)) * 100
            );
            return fraction > 0 && fraction < 50;
        },
        fullStars() {
            return Math.round(this.value); // 4捨5入
        },
        emptyStars() {
            // if rating = 1.9, ceil(1.9) = 2, 5-2 = 3, render 3 empty stars
            return 5 - Math.ceil(this.value);
        }
    },
};
</script>
