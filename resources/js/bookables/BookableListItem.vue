<template>
    <div class="card bookable-card mx-2 mb-3" style="width: 18rem;">
        <img src="/img/villa.jpg" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">{{ itemName }}</h5>
            <p class="card-text">{{ itemDescription }}</p>
            <a href="#" class="btn btn-primary">Book</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BookableListItem",
        props: {
            itemName: String,
            itemDescription: String,
            itemPrice: String,
            itemImage: String,
        }
    }
</script>

<style scoped>

</style>
