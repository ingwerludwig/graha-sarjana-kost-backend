<template>
    <div style="display: flex;"><button class="white" @click="$router.go(-1)">Kembali</button><button @click="$router.push('/')" class="green">Home</button></div>
    <div class="payment-container">
        <div class="payment-content">
            <div style="font-size: 28px; font-weight: 700; text-align: left;">Thank you so much for choosing</div>
            <div style="font-size: 32px; font-weight: 700; text-align: left;">Graha Sarjana</div>
            <div style="color: red;">Please proceed the payment before {{ getMaxDate() }} </div>
            <div style="font-size: 30px; font-weight: 700; margin: 10px 0px;">Rp {{ order.total_harga }}</div>
            <div class="metode_pembayaran">{{ order.metode_pembayaran }}</div>
            <div style="text-align: left; margin-top: 10px;">
                <label for="" style="font-size: 12px; font-weight: 700;">Upload your payment file<input type="file" name="" id=""></label>
            </div>
            <div style="margin-top: 20px; display: flex;">
                <div><button class="green">CONFIRM PAYMENT</button></div>
                <div><button class="red">CANCEL BOOKING</button></div>
            </div>
        </div>
    </div>
    
</template>

<script>
import axios from 'axios'

export default{
    data(){
        return{
            order: ''
        }
    },
    methods:{
        getMaxDate(){
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thrusday', 'Friday', 'Saturday']
            var jsDate = new Date()
            var nextDate = new Date(jsDate)
            nextDate.setDate(jsDate.getDate() + 1)
            var date = nextDate.getDate()
            var month = nextDate.getMonth() + 1
            var year = nextDate.getFullYear()
            var day = nextDate.getDay()

            return '23.59 ' + days[day] + ', ' + date + '/' + month + '/' + year
        },
        getOrder(){
            var url = "/api/getOrderDetails/" + this.$route.params.id
            axios.get(url, {headers: {Authorization: 'Bearer ' + localStorage.getItem('token')}}).then(res => {
                this.order = res.data.order[0]
                this.order.total_harga = this.toPrice(this.order.total_harga)
                console.log(this.order)
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
    },
    mounted(){
        this.getOrder()
    }
}
</script>

<style scoped>
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
input{
    border: none;
}
.metode_pembayaran{
    padding: 5px 30px;
    background-color: #00863132;
    width: fit-content;
    border-radius: 20px;
    margin: auto;
}
</style>
