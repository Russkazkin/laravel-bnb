<template>
    <div class="reviews-wrap">
        <h6 class="text-uppercase text-secondary font-weight-bolder">
            Review List
        </h6>
        <div class="border-bottom pb-3 mb-3 d-none d-md-block" v-for="number in 3" :key="number">
            <div class="row">
                <div class="col-md-6">
                    Rus Skazkin
                </div>
                <div class="col-md-6 text-uppercase d-flex justify-content-end">
                    Star Rating
                </div>
                <div class="col-md-12">
                    Added 5 minutes ago
                </div>
                <div class="col-md-12">
                    Duis lobortis massa imperdiet quam. Etiam vitae tortor. Donec vitae orci sed dolor rutrum auctor. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor. Vivamus laoreet.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReviewList"
    }
</script>

<style lang="sass" scoped>
.reviews-wrap
    padding: 1.25rem
</style>
