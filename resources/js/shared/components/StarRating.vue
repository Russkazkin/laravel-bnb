<template>
<div class="d-flex">
    <i class="fas fa-star"
       v-for="star in fullStars"
       :key="'full' + star"
       @click="$emit('input', star)">
    </i>
    <i class="fas fa-star-half-alt" v-if="halfStar"></i>
    <i class="far fa-star"
       v-for="star in emptyStars"
       :key="'empty' + star"
       @click="$emit('input', fullStars + star)">
    </i>
</div>
</template>

<script>
    export default {
        name: "StarRating",
        props: {
            value: Number,
        },
        computed: {
            halfStar() {
                if(this.value > 0 && this.value < 1) {
                    return true;
                }
                return this.value % this.fullStars;
            },
            fullStars() {
                return Math.floor(this.value);
            },
            emptyStars() {
                return this.halfStar ? 4 - this.fullStars : 5 - this.fullStars;
            },
        },
    }
</script>

<style scoped>

</style>
