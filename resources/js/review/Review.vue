<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="text-muted">Please rate your booking</label>
                    <star-rating v-model="review.rating"
                                 class="fa-2x">
                    </star-rating>
                </div>
                <div class="form-group">
                    <label for="content" class="text-muted">And add review if you wish</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Review",
        data() {
            return {
                review: {
                    rating: 5,
                    content: '',
                }
            }
        },
    }
</script>

<style scoped>

</style>
