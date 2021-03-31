<template>
    <div class="container-profile">
        <div class="container-profile-top">
            <div class="profile-image">
            </div>
        <div class="text-profile">
            <h4>{{itemDatas.lastName}} {{itemDatas.firstName}}</h4>
            <h6>Admin</h6>
        </div>
        </div>
        <div class="container-profile-bottom" >
              
           <form class="save-form" @submit.prevent="updateInfo">
          <div class="container"> 
                    <img :src="itemDatas.images" alt="User Avatar">
            </div>
            <!-- <div class="container">
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file'  @change="updateProfile" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                       <img :src="itemDatas.images" alt="User Avatar">
                    </div>
                    </div>
                </div> -->
           
            <div class="form-top">
                   <div class="form-top-firtsname">
                        <label class="labels">First Name<span class="red">(*)</span></label><br>
                        <input type="text" class="form-control" v-model="itemDatas.firstName">
                    </div>
                    <div class="form-top-fullname">
                        <label class="labels">Last name<span class="red">(*)</span></label><br>
                        <input type="text" class="form-control"  v-model="itemDatas.lastName" placeholder="" >
                    </div>
                 
            </div>  
           <div class="form-top">
                   <div class="form-top-firtsname">
                        <label class="labels">Email address<span class="red">(*)</span></label><br>
                        <input type="email" class="form-control"  v-model="itemDatas.email" placeholder="">
                    </div>
                    <div class="form-top-fullname">
                        <label class="labels">Phone number<span class="red">(*)</span></label><br>
                        <input type="text" class="form-control"  v-model="itemDatas.phone" placeholder="">
                    </div>
            </div> 
             <div class="form-top">
                   <div class="form-top-firtsname">
                        <label class="labels">Address<span class="red">(*)</span></label><br>
                        <input type="text" class="form-control"  v-model="itemDatas.address" placeholder="">
                    </div>
                    <div class="form-top-fullname">
                        <label class="labels">Date<span class="red">(*)</span></label><br>
                        <datetime format="YYYY-MM-DD" id ="date" width="100%"  v-model="itemDatas.birthday">
                        </datetime>
                    </div>
            </div> 
            <div class="form-top">
                    <input type="file" @change="updateProfile" name="images" class="form-input">
            </div>  
             <div class="form-top">
                <button @click.prevent="updateInfo" type="submit" class="btn-save">Update</button>
            </div>  
            </form>

        </div>
    </div>
</template>
<script>
import axios from "axios";
import firebase from "firebase/app";
import "firebase/storage";
import datetime from 'vuejs-datetimepicker';
export default {
components: { datetime },
name: 'ProfileAdmin',
 data () {
      return {
        itemDatas:{
            account:'',
            firstName:'',
            lastName:'',
            email:'',
            phone:'',
            address:'',
            password:'',
            birthday:'',
            gender: '',
            remember_token:'',
            images:'',
            caption : '',
            img1: ''
        },
        imageData: null
        }
    },
    created(){
        this.getData()
        const firebaseConfig = {
            apiKey: "AIzaSyB3WwnhfTjCOshHFIxmJgqJOImS6_EhmJc",
            authDomain: "gilo-25373.firebaseapp.com",
            projectId: "gilo-25373",
            storageBucket: "gilo-25373.appspot.com",
            messagingSenderId: "1057644567623",
            appId: "1:1057644567623:web:d86b37fee334a1a0206562",
            measurementId: "G-D1CL3L7CSX"
        };
        firebase.initializeApp(firebaseConfig);
    },
  
  methods:{
    // getProfilePhoto(){
    //         let images = (this.itemDatas.images.length > 200) ? this.itemDatas.images : " "+ this.itemDatas.images ;
    //         return images;
    //     },
        updateInfo(){
        console.log(this.itemDatas)
     

        const itemid = JSON.parse(localStorage.getItem("data"));
        axios.patch('http://127.0.0.1:8000/api/updateProfile/'+ itemid, this.itemDatas).then(response =>(
                console.log("success"),
                this.itemDatas=response.data,
                    // console.log(this.formData),
                    this.getData()
            )).catch(error => console.log(error))
    },

    updateProfile(e){
        let imagesAdmin = e.target.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(imagesAdmin);
        reader.onload = e => {
        this.itemDatas.images = e.target.result;
        console.log(e.target.result);
        }
        this.imageData = e.target.files[0];
        this.onUpload()
    },

    getData(){
    const itemDatas = JSON.parse(localStorage.getItem("data"));
    axios.get('http://127.0.0.1:8000/api/profileAdmin/'+  itemDatas)
    .then(response =>(
        console.log(response),
         this.itemDatas = response.data
         
    ))
    },

    onUpload(){
        this.img1=null;
        const storageRef=firebase.storage().ref(`${this.imageData.name}`).put(this.imageData);
        this.itemDatas.images=this.imageData.name;
        // console.log(this.imageData.name);
        console.log(storageRef);
        storageRef.on(`state_changed`,snapshot=>{
        this.uploadValue = (snapshot.bytesTransferred/snapshot.totalBytes)*100;
            }, error=>{console.log(error.message)},
        ()=>{this.uploadValue=100;
            storageRef.snapshot.ref.getDownloadURL().then((url)=>{
                this.img1 =url;
                this.itemDatas.images=url;
                console.log(this.img1)
                });
            }      
            );
        },
    }
}
</script>
<style lang="css" scoped>
.container-profile {
    margin: 160px 20px 5px 300px;
    border-radius: 2px;
    width: 650px;
    height: 600px;
    border: 2px solid #efc7ca;
    background-color: #efc7ca;
}
tr td h4{
    color:black;
}

.container-profile-top{
    display: flex;
    flex-direction: column column;
    margin: 0px 200px 30px 250px;
}
.container-profile-top img {
    width: 70px;
    height: 70px;
    border-radius: 55%;
    margin-top: 20px;
}
.profile-image .avata{
    margin-top: 25px;
}
.profile-image .edit-img {
    width: 12px;
    height: 12px;
    border-radius: 5px;
    background-color: #f32da7;
    margin: auto auto auto -12px;
}
.text-profile {
    margin: 25px 10px 5px 20px;
    margin-top: 25px;
}
.text-profile h6{
    opacity: 0.6;
    font-family: cursive;
}
.container-profile-bottom{
display: flex;
flex-direction: column;
}
.save-form .form-top{
line-height: 2.5;

}

 .form-top {
    display: flex;
    margin-left: 90px;
    width: 70%;
    justify-content: space-between;
}
.save-form{
    margin: -20px 0;
}
.form-top-firtsname .form-control {
    border-radius: 4px;
    border: 1px solid grey;
    background: #fdfcfc;
}

input[data-v-4bd11526] {
    padding: 3px;
    border: 1px solid rgb(63, 5, 5);
    background-color: #fb86a9;
    height: 30px;
    width: 200px;
    font-weight: bold;
    outline: none;
}
.form-top-fullname .form-control{
    border-radius: 4px;
    border: 1px solid grey;
    background: #fdfcfc;
}
.form-control {
    height: 30px;
    width: 200px;
    font-weight: bold;
    outline: none;
}
.form-top .labels{
   opacity: 0.7;
   font-family:monospace;
}
.form-top div{
    margin-top: 20px;
}
.btn-save {
    background-color: #fb8690;
    color: cornsilk;
    border-radius: 8px;
    box-shadow: 0.5px 0.5px 1px 0.5px rgb(68 68 68 / 40%);
    outline: none;
    padding: 5px 10px 5px 10px;
    margin: 25px 0 0 170px;
    width: 30%;
}
.red{
    color: rgb(247, 8, 8);
}
/* avatar */
.container{
    width: 100px;
    height: 100px;
    /* margin: 30px auto;
    padding: 20px; */
}
.container img{
    margin-left: 250px;
    border-radius: 100px;
    width: 90px;
    height: 90px;
}
.avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 50px auto;
}
.avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
}
 .avatar-edit input {
        display: none;
 }
 /* .avatar-edit label {
        margin: -5px -5px 1px 25px;
        display: block;
        width: 20px;
        height: 20px;
        border-radius: 100%;
        background: #FFFFFF;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
 }
 .avatar-edit label:hover{
        background: #f1f1f1;
        border-color: #d6d6d6;
 } */
 .avatar-edit label:after{
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        text-align: center;
        margin: -70px 0px 0 150px;
 }
 .avatar-preview {
    width: 95px;
    height: 95px;
    position: relative;
    border-radius: 100%;
    margin-left: 240px;
    margin-top: -50px;
    border: 5px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 10%);
 }
.avatar-preview img{
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
}
.avatar-preview img{
    width: 80px;
    height: 80px;
    border-radius: 100%;
    background-size: cover; 
}
</style>