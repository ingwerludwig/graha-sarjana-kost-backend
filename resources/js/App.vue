<template>
    <div>
      <router-view/>
    </div>
    
  </template>
  
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,700;1,400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,200;1,400&display=swap');
  #app {
    font-family: Poppins, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
  }
  html, body {
      max-width: 100%;
      overflow-x: hidden;
  }
  
  button {
    min-width: 100px;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-weight: bold;
    margin: 10px 10px;
    font-size: 15px;
  }
  .red{
    border: 1px solid #a20000;
    background-color: #a20000;
    color: #fff;
  }
  .red:hover{
    background-color: #b50000;
  }
  .green {
    border: 1px solid #008631;
    background-color: #008631;
    color: #fff;
  }
  .green:hover{
    background-color: #008f35;
  }
  .white{
    background-color: #fff;
    border: 1px solid rgb(185, 184, 184);
    color: #008631;
  }
  .white:hover{
    border: 1px solid #00863179;
    background-color: #00863107;
  }
  
  input {
    padding: 5px 0px;
    padding-left: 10px;
    outline: none;
    border: 1px solid #aaa;
    border-radius: 5px;
    height: 27px;
    width: 95%;
    font-family: Avenir, Helvetica, Arial, sans-serif;
  }
  
  .form{
    text-align: left;
    margin-bottom: 10px;
  }
  
  .input-container{
    padding: 5px 5px;
  }
  .input-container label{
    font-weight: bold;
    display: block;
    padding: 5px 0px ;
  }
  
  /*POP UP*/
  .popup {
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      z-index: 99;
      background-color: rgba(0, 0, 0, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
  
  }
  .popup-inner {
      background: #FFF;
      padding: 30px;
      border-radius: 10px;
  }
  </style>
  