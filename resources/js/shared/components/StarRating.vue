<template>
<div class="d-flex">
    <i class="fas fa-star" v-for="star in fullStars" :key="'full' + star"></i>
    <i class="fas fa-star-half-alt" v-if="halfStar"></i>
    <i class="far fa-star" v-for="star in emptyStars" :key="'empty' + star"></i>
</div>
</template>

<script>
    export default {
        name: "StarRating",
        props: {
            rating: Number,
        },
        computed: {
            halfStar() {
                if(this.rating > 0 && this.rating < 1) {
                    return true;
                }
                return this.rating % this.fullStars;
            },
            fullStars() {
                return Math.floor(this.rating);
            },
            emptyStars() {
                return this.halfStar ? 4 - this.fullStars : 5 - this.fullStars;
            },
        },
    }
</script>

<style scoped>

</style>
