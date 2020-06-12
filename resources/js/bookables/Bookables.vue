<template>
<div>
    <div v-if="bookable1" class="container">
        <bookable-list-item :item-title="bookable1.title"
                            :item-content="bookable1.content"
                            :item-price="bookable1.price">
        </bookable-list-item>
        <bookable-list-item :item-title="bookable2.title"
                            :item-content="bookable2.content"
                            :item-price="bookable2.price">
        </bookable-list-item>
        <bookable-list-item :item-title="bookable3.title"
                            :item-content="bookable3.content"
                            :item-price="bookable3.price">
        </bookable-list-item>
        <bookable-list-item item-title="Cheap villa 4"
                            item-content="A very cheap villa 4"
                            :item-price="10000">
        </bookable-list-item>
        <bookable-list-item item-title="Cheap villa 5"
                            item-content="A very cheap villa 5"
                            :item-price="10000">
        </bookable-list-item>
    </div>
    <div v-else class="container">Loading...</div>
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
                bookable1: null,
                bookable2: null,
                bookable3: null,
            }
        },
        created() {
            setTimeout(() => {
                this.bookable1 = {
                    title: 'Cheap villa data 1',
                    content: 'A very cheap villa data ',
                    price: 10000,
                };
                this.bookable2 = {
                    title: 'Cheap villa data 2',
                    content: 'A very cheap villa data ',
                    price: 10000,
                };
                this.bookable3 = {
                    title: 'Cheap villa data 3',
                    content: 'A very cheap villa data ',
                    price: 10000,
                };
            }, 2000);
        }
    }
</script>

<style scoped>

</style>
