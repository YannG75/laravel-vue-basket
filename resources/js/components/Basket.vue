<template>
    <div>
        <div class="card">
            <div class="card-header">
                Basket
            </div>
            <ul class="list-group list-group-flush">
                <li v-for="(product, i) in basket" :key="i" class="list-group-item d-flex justify-content-between">
                    <div>
                        <span class="">{{product.quantity}} x {{product.product.name}}</span>
                        <span class="ml-3">{{product.product.price}} €</span>
                    </div>
                    <i class="far fa-trash-alt text-danger d-flex align-items-center" @click="deleteProduct(product.product_id,i)"></i>
                </li>
            </ul>
            <button class="btn btn-outline-danger" v-if="basket.length !== 0" @click="destroy">Remove All</button>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "basket",
        props: {
            basket: Array
        },data(){
            return {
            }
        },

        methods: {
            deleteProduct($id,$index){
                axios.delete(process.env.APP_URL+'/api/cart/'+$id)
                .then( res => {
                    if(res.status === 200)
                        axios.get(process.env.APP_URL+'/api/cart')
                            .then(basket => {
                                this.$emit("update-basket", basket.data)
                            })
                })
            },

            destroy() {
                axios.delete(process.env.APP_URL+'/api/cart')
                .then(res => {
                    if(res.status === 200)
                        axios.get(process.env.APP_URL+'/api/cart')
                            .then(basket => {
                                this.$emit("update-basket", basket.data)
                            })
                })
            }
        }
    }
</script>

<style lang="scss">
.fa-trash-alt {
    cursor: pointer;
}
</style>
