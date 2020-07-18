<template>
    <div class="reviews-wrap">
        <h6 class="text-uppercase text-secondary font-weight-bolder">
            Review List
        </h6>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="border-bottom pb-3 mb-3 d-none d-md-block" v-for="(review, index) in reviews" :key="index">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Rus Skazkin
                    </div>
                    <div class="text-uppercase">
                        <star-rating :value="review.rating" class="fa-sm"></star-rating>
                    </div>
                </div>
                <div>
                    {{ review.created_at | fromNow }}
                </div>
                <div>
                    {{ review.content }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReviewList",
        props: {
            bookableId: String,
        },
        data() {
            return {
                loading: false,
                reviews: [],

            }
        },
        async created() {
            this.loading = true;
            try {
                this.reviews = (await axios.get(`/api/bookables/${this.bookableId}/reviews`)).data.data;
            } catch (e) {
                console.log(e.response);
            } finally {
                this.loading = false;
            }
        }
    }
</script>

<style lang="sass" scoped>
.reviews-wrap
    padding: 1.25rem
</style>
