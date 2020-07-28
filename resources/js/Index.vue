<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark mb-4">
            <router-link class="navbar-brand" :to="{name: 'home'}">Laravel BnB</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
                    </li>
                </ul>
            </div>
            <router-link class="btn btn-outline-light" :to="{name: 'home'}">
                Basket <span v-if="itemsInBasket" class="badge badge-light ml-2">{{ itemsInBasket }}</span>
            </router-link>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
    import { mapState, mapGetters } from "vuex";
    export default {
        name: "Index",
        data() {
            return {
                lastSearch: this.$store.state.lastSearch,
            }
        },
        computed: {
            ...mapState({
                lastSearchComputed: "lastSearch",
            }),
            ...mapGetters({
                itemsInBasket: "itemsInBasket",
            }),
        }
    }
</script>

<style scoped>

</style>
