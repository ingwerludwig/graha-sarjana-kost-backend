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
        <div>PESANAN SAYA</div>
      </div>
      <div>
        <router-link :to="`/login_register/login`"><button class="white">LOGIN</button></router-link>
        <router-link :to="`/login_register/regitser`"><button class="green">SIGN UP</button></router-link>
      </div>
    </nav>
    <div class="home">
      <div class="circle"></div>
      <div class="circle2"></div>
      <div>Hi [NAMA]</div>
      <div style="font-size: 64px; font-weight: bold; text-align: left;">SELAMAT DATANG <br>DI GRAHA SARJANA 1</div>
      <div style="text-align: left; width: 500px; font-size: 21px; font-weight: 500; font-family: OpenSans;">Kos murah meriah dengan fasilitas mewah.<br>Ayo tunggu apalagi? Booking sekarang!</div>
      <div style="display: flex; margin-top: 15px;">
        <button class="white">Booking Kos</button>
        <button class="green">About Us</button>
      </div>    
    </div>
    <nav class="footer">
      <div class="left">
        <div class="title">GRAHA SARJANA KOS</div>
      </div>
      <div class="right">
        <div>
          <div class="title">KOS</div>
          <div>Daftar Kos</div>
        </div>
        <div>
          <div class="title">INFORMATION</div>
          <div>Terms</div>
          <div>Privacy</div>
          <div>Policy</div>
          <div>FAQs</div>
        </div>
        <div>
          <div class="title">CONTACT</div>
          <div>Sosmed</div>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  
  
  export default {
    
  }
  </script>

  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');

  .circle{
    position: absolute;
    width: 500px;
    height: 500px;
    border-radius: 50%;
    background-color: #008631;
    left: 70%;
    z-index: 99;
  }
  .circle2{
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: #008631;
    top: 80%;
    left: 70%;
  }
  .home{
    height: 100%;
    background-color: rgb(255, 255, 255);
    border: 1px solid black;
    padding: 10px 15px;
  }
  .navbar{
    color: #2c3e507d;
    font-weight: 600;
    justify-content: space-between;
    display: flex;
  }
  nav{
    border: 1px solid black;
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
    justify-content: space-around;
    padding: 20px 20px;
    background-color: #008631;
    color: white;
  }

  .left{
    padding:10px 10px;
  }
  .left .title{
    font-family: 'Roboto Mono', monospace;
    font-size: 32px;
    font-weight: 700;
  }

  .right{
    display: flex;
    padding: 10px 10px;
  }
  .right > div{
    text-align: left;
    display: block;
    padding: 0px 10px;
  }
  .right > div >div{
    padding-bottom: 5px;
  }
  .right .title{
    font-size: 22px;
    font-weight: bold;
  }
  </style>
  