<template>
    <div>
        <h6 class="text-uppercase font-weight-bolder text-secondary">Price Breakdown</h6>
        <div v-for="(days, price) in total.breakdown" :key="price" class="py-2 border-top border-bottom mb-2 d-flex justify-content-between">
            <div>{{ days }} x ${{ price }}</div> <div>${{ days * price }}</div>
        </div>
        <div class="font-weight-bolder d-flex justify-content-between">
            <div>Total:</div>
            <div>${{ total.total }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PriceBreakdown",
        props: {
            total: Object,
        },
    }
</script>

<style scoped>

</style>
