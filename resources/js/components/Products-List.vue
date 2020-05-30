<template>
    <div class="container grid">
        <div v-for="(product, i) in products" class="card" :key="i">
            <div class="card-body">
                <h5 class="card-title">{{product.name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{product.price}} €</h6>
                <p class="card-text">{{product.description}}</p>
                <button class="btn btn-info" @click="addToCard(product.id)">I want It !</button>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from "axios";

    export default {
        name : 'Products',
        data() {
            return {
            }
        },
        props : {
            products: Array,
            basket: Array
        },
        methods: {
            addToCard($id) {
                axios.post('https://lvl-vue-basket.herokuapp.com/api/cart', {product_id: $id})
                .then( res => {
                    if(res.status === 200)
                    axios.get('https://lvl-vue-basket.herokuapp.com/api/cart')
                    .then(basket => {
                        this.$emit("update-basket", basket.data)
                    })

                })
            }
        }
    }
</script>

<style lang="scss">
    .grid {
        display: grid;
        grid-template-columns: repeat(3,1fr);
        grid-gap: 10px;
        grid-auto-rows: minmax(100px, auto);
    }
</style>
