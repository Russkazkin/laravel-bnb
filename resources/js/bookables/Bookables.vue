<template>
<div>
    <div v-if="loading" class="container">Loading...</div>
    <div v-else class="container">
        <bookable-list-item :item-title="bookable.title"
                            :item-content="bookable.content"
                            :item-price="bookable.price"
                            v-for="(bookable, index) in items"
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
            }
        },
        created() {
            this.loading = true;
            setTimeout(() => {
                this.items = [
                    {
                        title: 'Cheap villa data 1',
                        content: 'A very cheap villa data 1',
                        price: 10000,
                    },
                    {
                        title: 'Cheap villa data 2',
                        content: 'A very cheap villa data 2',
                        price: 10000,
                    },
                    {
                        title: 'Cheap villa data 3',
                        content: 'A very cheap villa data 3',
                        price: 10000,
                    }
                ];
                this.loading = false;
            }, 2000);

        }
    }
</script>


<style scoped>

</style>
