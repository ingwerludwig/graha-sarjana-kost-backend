<template>
<div style="display: flex;"><button class="white" @click="$router.go(-1)">Kembali</button></div>
<div class="payment-container">
        <div class="payment-content">
            <div style="font-size: 28px; font-weight: 700; text-align: left;">My Orders</div>
            <div style="font-style: italic;" v-if="orders.length == 0">No orders available</div>
            <div class="orders-wrapper" v-for="order in orders" :key="order.id" v-if="orders.length != 0">
                <div class="order">
                    <div style="font-size: 22px; font-weight: 700;">Kamar {{ order.no_kamar }}</div>
                    <div>Metode pembayaran: {{ order.metode_pembayaran }}</div>
                    <div>Tanggal Masuk: {{ order.date_mulai }}</div>
                    <div>Durasi: {{ order.durasi_kost }} bulan</div>
                    <div>Tanggal Selesai: {{ order.date_selesai }}</div>
                    <div>Status: {{ displayStatus(order.status) }}</div>
                    <div>Total <div style="font-size: 30px; font-weight: 700;" >Rp {{ toPrice(order.total_harga) }}</div></div>
                </div>
                <div class="action">
                    <div v-if="isPaid(order.status)" style="font-style: italic; font-size: 16px; font-weight: 500;" >{{ order.status }}</div>
                    <div v-if="!isPaid(order.status)"><button class="green" @click="routeTo(order.id)"> {{order.status}}</button></div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default{
    data(){
        return{
            orders: [],
        }
    },
    methods:{
        getOrders(){
            const url = '/api/getUserOrder'
            axios.get(url, {headers: {Authorization: 'Bearer ' + localStorage.getItem('token')}}).then(res => {
                this.orders = res.data.order
                this.orders.forEach((order) => {
                    this.changeStatus(order)
                })
            }).catch(err => {
                console.log(err)
            })
        },
        toPrice(price) {
            var new_price = price.toString()
            new_price = new_price.split('')
            var n_dots = Math.floor(new_price.length / 3)
            var it = 1
            for(it; it<n_dots+1; it++){
                var pos = new_price.length+1-it-3*it
                new_price.splice(pos,0,'.')
            }
            return new_price.join('')
        },
        changeStatus(order){
            if(order.status == 'AWAITING_PAYMENT')
                order.status = "Proceed payment"
            else if(order.status == 'AWAITING_VERIFICATION')
                order.status = 'Waiting Verification'
            else if(order.status == 'VERIFIED')
                order.status = 'Verified'
            else
                order.status = 'Cancelled'
        },
        displayStatus(status){
            if(status == 'Proceed payment')
                return "Please proceed the payment"
            else if(status == 'Waiting Verification')
                return "Waiting for verification from the admin"
            else if(status == 'Verified')
                return "Payment is verified. Please make an appointment with the Admin via available contacts"
            else
                return "Booking is cancelled"
        },
        isPaid(status){
            if (status == 'Proceed payment') return false
            return true
        },
        routeTo(orderId){
            this.$router.push('/payment/' + orderId)
        }
    },
    mounted(){
        this.getOrders()
    }
}
</script>

<style>
.payment-container{
    padding: 20px 40px;
    width: 50%;
    margin: auto;
}
.payment-content{
    padding: 20px 20px;
    box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.094);
    margin-top: 10px;
    margin: auto;
    border-radius: 10px;
}
.orders-wrapper{
    text-align: left;
    padding: 10px 14px;
    margin: 14px 6px;
    border-radius: 10px;
    background-color: rgba(220, 198, 0, 0.177);
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.action{
    border-left: 2px solid rgba(0, 0, 0, 0.304);
    display: flex;
    align-items: center;
    height: 160px;
    padding-left: 10px;
}
</style>