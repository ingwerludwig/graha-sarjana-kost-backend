<template>
    <div class="container">
      <div style="text-align: left; font-size: 32px; font-weight: bold; padding: 20px 20px;">{{buttTxt}}</div>
      <div class="sub">

        <form action="/api/create_user" method="POST" @submit="register()">
            <div v-if = "!isLogin">
                <label for="">Full Name</label>
                <input type="text" v-model="fullname" name="username" placeholder="Enter full name...">
            </div>
            <div>
                <label for="">Email</label>
                <input type="text" name="email" placeholder="Enter email...">
            </div>
            <div>
                <label for="">Password</label>
                <input type="text" name="password" placeholder="Enter password...">
            </div>
            <div>
                <button type="sumit" class="green">{{buttTxt}}</button>
            </div>
            <hr>
            <div>
                {{message}}<span style="cursor: pointer; color:#008631; font-weight: bold;" @click="registerOn()" > {{span}}</span>
            </div>
        </form>
      </div>
    </div>
  </template>
  
<script>
  export default {
    data (){
        return{
            type: this.$route.params.type,
            buttTxt: 'LOGIN',
            isLogin: true,
            message: "Don't have any account yet?",
            span: ' Sign Up',
            username: '',
            email: '',
            password: ''
        }
    },
    methods: {
        register(){
            axios.post('./api/create_user',{
                username:this.username,
                email:this.email,
                password:this.password})
        },

        registerOn(){
            this.isLogin = !this.isLogin
            if(this.isLogin){
                this.buttTxt = 'LOGIN'
                this.message = "Don't have any account yet?"
                this.span = ' Sign Up'
            }
            else{
                this.buttTxt = 'REGISTER'
                this.message = 'Already have an account'
                this.span = ' Login'
            }
            
        }
    },
    mounted(){
        if(this.type == 'login') this.isLogin = false
        else this.isLogin = true
        this.registerOn()
    }
  }
  </script>
<style scoped>
.container{
    position: absolute;
    padding: 20px 10px;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20%;
    border-radius: 5px;
    margin: 0;
    box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.094);
}
.sub div{
    padding: 10px 20px;
}
.sub label{
    display: flex;
    margin-left: 5px;
    margin-bottom: 5px;
}
hr{
    background-color: #01702a;
    height: 1px;
    width: 70%;
    border: none;
}
</style>