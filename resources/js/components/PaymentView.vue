<template>
    <div><button class="white">Home</button></div>
    <div class="payment-content">
        <div>Thank you so much for choosing Graha Sarjana</div>
        <div>Please proceed the payment before {{ currentDate }} </div>
    </div>
</template>

<script>
export default{
    data(){
        return{
            currentDate: new Date().getDate().toString() + '/' + (new Date().getMonth + 1).toString() + '/' + new Date().getFullYear()
        }
    }
}
</script>

<style scoped>

</style>
