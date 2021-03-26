<template>
<div class="background-out">
   <div class="container-login">
       <!-- <div class="top-layout-login">
           <div class="left-choose-page">
              <a href="#home">Home</a>
               <a href="#Oproduct">Our product</a>
               <a href="#contact">Contact</a>
               <a href="#about">About us</a>
           </div>
           <div class="right-btn">
               <button type="button" class="butt">bttt</button>
           </div>
       </div> -->
       <div class="body-login">
           <div class="body-login-left">
               <h2 class="text-login">Login</h2>
              <form class="login-form" @submit.prevent="onSubmit" method="post">
                    <div class="form-group">
                        <input type="text" name="account" class="form-control" v-model="account" required placeholder="Username">

                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" v-model="password" required placeholder="Password">
                    </div>


                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        <small>Remember Me</small>
                        </label>
                        <button type="submit" class="float-right">Login</button>
                    </div>

            </form>
           </div>

        <div class="body-login-right">
            <div class="layout_img_login">
                <img class="img_login" src="images/Gift.png" />
            </div>
            <div class="layout_img_login">
                <img class="do" src="images/red.png" />
            </div>

            <div class="layout_img_login">
                <img class="xanhdt" src="images/blue.png" />
            </div>
            <div class="layout_img_login">
                <img class="xanhlacay" src="images/blue2.png" />
            </div>
        </div>
       </div>
    </div>
        <div class="layout_img_login">
            <img class="do1" src="images/red.png" />
        </div>

        <div class="layout_img_login">
            <img class="xanhdt1" src="images/blue.png" />
        </div>
        <div class="layout_img_login">
            <img class="xanhlacay1" src="images/blue2.png" />
        </div>
        <div class="layout_img_login">
            <img class="do2" src="images/red.png" />
        </div>
    </div>
</template>

<script>
import axios from 'axios';
  export default {
    name: "LoginAdmin",
    data: () => {
        return {
            account: "",
            password: "",
            error: {},
            generalError: ""
        }
    },
    methods: {
         onSubmit() {
            const data = {
                account: this.account,
                password: this.password
            }
                // const response = await axios.post(`${process.env.MIX_GIFS_API_HOST}/api/loginAdmin`, data);
                // this.$emit("onUserChanged", response.data.user);
                // alert("Login Successfully");
                alert(this.account);
                axios.post(`${process.env.MIX_GIFS_API_HOST}/api/loginAdmin`, data);
                alert("Login Successfully");
        }
    }
  }
</script>

<style lang="css" scoped>
.background-out{
    background-color: rgb(181 227 220);
    margin-top: 20px;
    width: 1100px;
    height: 700px;
    box-shadow: 2px 1px 5px 2px rgb(68 68 68 / 40%);
    margin-left: 300px;
    background-color: #fb8690;
    background-image: linear-gradient(to top right, #fb8690, rgb(252, 249, 250));
}
.xanhlacay1{
    width: 200px;
    border-radius: 30%;
    position: absolute;
    left: 15%;
    top: 530px;
}
.do1{
    width: 200px;
    border-radius: 50%;
    position: absolute;
    right: 1000px;
    z-index: 1;
    top: 1px;
}
.do2{
    width: 200px;
    border-radius: 30%;
    position: absolute;
    left: 12%;
    top: 450px;
}
.xanhdt1{
    width: 200px;
    border-radius: 30%;
    position: absolute;
    right: 1000px;
    z-index: 0;
    top: 100px;
}
.container-login {
    position: absolute;
    display: flex;
    flex-direction: column;
    border-radius: 2px;
    top: 40%;
    left: 35%;
    transform: translate(-50%, -50%);
    width: 750px;
    height: 430px;
    box-shadow: 2px 1px 5px 2px rgb(68 68 68 / 40%);
    background-color: #fb8690;
    background-image: linear-gradient(to top left, #fb8690, rgb(252, 249, 250));
}
.top-layout-login{
    margin: 30px 50px 30px 50px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.left-choose-page{
   width: 300px;
   display: flex;
   flex-direction: row;
   justify-content: space-between;
}
.left-choose-page a{
    color: #74cfc0;
    font-weight: bold;
}
.right-btn button{
   padding: 10px 25px 10px 25px;
   background-color: #74cfc0;
   color: #fff;
   font-weight: 700;
}

.body-login{
    margin: 50px 70px 100px 70px;
    display: flex;
    justify-content: space-between;

}
.body-login-left{
    margin-left: 50px;
    width: 250px;
    height: 250px;
    display: flex;
    flex-direction: column;
}
.text-login{
    border-bottom-width: 2px;
    border-color: #fb8690;
    width: 100px;
    padding: 0px 20px 0px 20px;
    color: #fb8690;
}
.form-group{
    margin-top: 20px;
    border-radius: 10px;
    box-shadow: 2px 1px 5px 2px rgba(68, 68, 68, 0.4);
    width: 200px;
    padding-left: 10px;
}

.form-control{
    height: 30px;
    font-weight: bold;
    outline: none;
}
.form-check{
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    width: 200px;
}
.butt{
    padding: 5px 10px 5px 10px;
    background-color: #1a5147;
    color: #fff;
    border-radius: 8px;
    box-shadow: 0.5px 0.5px 1px 0.5px rgba(68, 68, 68, 0.4);
    outline: none;
}
.float-right{
    padding: 5px 10px 5px 10px;
    background-color: #74cfc0;
    color: #fff;
    border-radius: 8px;
    box-shadow: 0.5px 0.5px 1px 0.5px rgba(68, 68, 68, 0.4);
    outline: none;
}
.body-login-right{
    float: right;
}
.layout_img_login{
    margin-top: 7px;
    width: 200px;
    padding-right: 10px;
}
.img_login{
    width: 150px;
    z-index: 2;
    position: absolute;
    top: 200px;
    right: 100px;
}
.do{
    width: 400px;
    border-radius: 50%;
    position: absolute;
    right: -60px;
    z-index: 1;
    top: 120px;
}
.xanhdt{
    width: 450px;
    border-radius:30%;
    position:absolute;
    right: 0%;
    z-index: 0;
    top: 100px;
}
.xanhlacay{
    width: 500px;
    border-radius:30%;
    position:absolute;
    right: 0%;
    z-index: -1;
    top: -50px;
}
</style>
