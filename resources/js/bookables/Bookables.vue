<template>
<div>
    <div v-if="loading" class="container">Loading...</div>
    <div v-else class="container d-flex justify-content-center flex-wrap">
        <bookable-list-item :item-name="item.name"
                            :item-description="item.description"
                            :item-price="item.price"
                            v-for="(item, index) in items"
                            :key="index"
        ></bookable-list-item>
    </div>
</div>
</template>

<script>
    import BookableListItem from "./BookableListItem";
    export default {
        name: "Bookables",
        components: {
            BookableListItem
        },
        data() {
            return {
                items: null,
                loading: false,
                columns: 3,
            }
        },
        computed: {
            rows() {
                return this.items ? Math.ceil(this.items.length / this.columns) : 0;
            },
        },
        methods: {},
        created() {
            this.loading = true;
            axios
                .get("/api/bookables")
                .then(response => {
                    this.items = response.data;
                    this.loading = false;
                });
        }
    }
</script>


<style scoped>

</style>
