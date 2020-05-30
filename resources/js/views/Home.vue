<template>
    <div class="Home">
        <nav class="navbar navbar-light bg-light shadow mb-5 sticky-top">
            <span class="navbar-brand mb-0 h1">Navbar</span>
            <span>{{basket.length}} item{{basket.length >1 ? 's': ''}} in cart ({{count }} €)</span>
        </nav>
        <main class="d-flex bg">
            <Products :products="AllProducts" :basket="basket" @update-basket="UpdateBasket" class="w-75"></Products>
            <Basket :basket="basket" :count="count" @update-basket="UpdateBasket" class="w-25"></Basket>
        </main>
    </div>

</template>


<script>
    import axios from 'axios'
    import Products from '../components/Products-List'
    import Basket from '../components/Basket'
    export default {
        name: "Home",
        data() {
            return {
                AllProducts: [],
                basket: [],
                count: 0
            }
        },
        components: {
            Products,
            Basket
        },
        mounted() {
            axios.get(process.env.APP_URL+'/api/products')
            .then(product => {
                this.AllProducts = product.data
            })

            axios.get(process.env.APP_URL+'/api/cart')
            .then( cart => {
                this.basket = cart.data
                this.basket.forEach( product => {
                    this.count += product.product.price * product.quantity
                })
            })

        },
        methods: {
            UpdateBasket(newValue){
                this.basket = newValue
                this.count =0
                this.basket.forEach( product => {
                    this.count += product.product.price * product.quantity
                })
            }
        }
    }
</script>

<style lang="scss">
.Home {
    background: aliceblue;
}
</style>
