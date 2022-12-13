<template>
    <nav class="navbar">
      <div class="logo">
        <div style="margin: auto; padding-left: 10px; padding-top: 15px;">
          <div style="font-family: OpenSans; margin: auto; font-size: 24px; color: black;">GRAHA SARJANA</div>
          <hr>
        </div>
        
      </div>
      <div style="display: flex;" class="fitur">
        <div><router-link to="/daftar_kos" style="text-decoration: none; color: inherit;">DAFTAR KOS</router-link></div>
        <div>ABOUT US</div>
      </div>
      <div>
        <router-link :to="`/login_register/login`"><button class="white">LOGIN</button></router-link>
        <router-link :to="`/login_register/regitser`"><button class="green">SIGN UP</button></router-link>
      </div>
    </nav>
    <div class="circle"></div>
    <div class="circle2"></div>
    <div class="home">
      <div> </div>
      <div style="font-size: 64px; font-weight: bold; text-align: left;">SELAMAT DATANG <br>DI GRAHA SARJANA 1</div>
      <div style="text-align: left; width: 500px; font-size: 21px; font-weight: 500; font-family: OpenSans;">Kos murah meriah dengan fasilitas mewah.<br>Ayo tunggu apalagi? Booking sekarang!</div>
      <div style="display: flex; margin-top: 15px;">
        <router-link to="/daftar_kos" style="text-decoration: none;"><button class="white">Booking Kos</button></router-link>
      </div>    
    </div>
    <nav style="background-color: #008631;box-shadow: 0px 0px 10px 10px rgba(0, 0, 0, 0.094);">
      <div class="footer">
        <div class="left">
          <div style="font-family: 'Roboto Condensed', sans-serif; font-size: 30px; font-weight: bold; margin-bottom: 10px;">SUBSCRIBE NOW</div>
          <div><input type="text" placeholder="EMAIL" style="font-family: 'Roboto Condensed', sans-serif;"></div>
          <div><button class="white">SUBSCRIBE</button></div>
        </div>
        <div class="right">
          <div>
            <div style="font-size: 24px; font-weight: bold;">INFORMASI</div>
            <div>Daftar Kos</div>
            <div>Tentang Kami</div>
          </div>
          <div>
            <div style="font-size: 24px; font-weight: bold;">CONTACT US</div>
            <div>Facebook</div>
            <div>Instagram</div>
            <div>Twitter</div>
          </div>
        </div>
      </div>
      <div style="font-size: 11px; color: white; padding-bottom: 16px;">Copyright © 2022 Software Design Group 6 {{ id}}</div>
    </nav>
  </template>
  
  <script>
  export default {
    data(){
      return{
        id: localStorage.getItem('userId')
      }
    },
  }
  </script>
  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
  .circle{
    position: absolute;
    width: 500px;
    height: 500px;
    border-radius: 50%;
    background-color: #008631;
    left: 70%;
    z-index: -1;
  }
  .circle2{
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: #008631;
    top: 80%;
    left: 70%;
    z-index: -1;
  }
  .home{
    height: calc(100vh - 67px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 0px 15px;
    margin: 0;
  }
  .navbar{
    color: #008631;
    font-weight: 600;
    justify-content: space-between;
    display: flex;
  }
  .fitur{
    margin: auto;
  }
  .fitur div{
    padding: 0px 10px;
  }
  .logo{
    display: flex;
  }
  .footer{
    display: flex;
    justify-content: space-between;
    color: white;
    padding: 50px 50px;
  }
  .left{
    width: 400px;
  }
  .footer input{
    padding-left: 30px;
    border: none;
    border-radius: 20px;
    height: 40px;
    width: 100%;
  }
  .footer .white{
    margin: 16px 0px;
    border-radius: 20px;
    padding: 13px 0px;
    color: white;
    background-color: #2c3e32;
    border: none;
    width: 100%;
  }
  .footer .white:hover{
    background-color: #324638;
  }
  .right{
    display: flex;
    text-align: left;
  }
  .right > div{
    padding: 0px 40px;
  }
  .right > div > div{
    padding-top: 10px;
  }
  </style>
  