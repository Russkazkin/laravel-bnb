<template>
    <div class="card bookable-card mx-2 mb-3" style="width: 18rem;">
        <router-link :to="{name: 'bookable', params: { id }}">
            <img :src="image" class="card-img-top" alt="">
        </router-link>
        <div class="card-body">
            <h2 class="mb-3">
                <span class="badge badge-success">
                    Price: {{ price }} $US
                </span>
            </h2>
            <h5 class="card-title">{{ name }}</h5>
            <p class="card-text">{{ description }}</p>
            <router-link class="btn btn-info color-white bookable-more-btn" :to="{name: 'bookable', params: { id }}">More</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BookableListItem",
        props: {
            id: Number,
            name: String,
            description: String,
            price: String,
            image: String,
        }
    }
</script>

<style scoped>

</style>
