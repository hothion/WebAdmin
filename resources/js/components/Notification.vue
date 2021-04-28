<template>
<div>
<router-view></router-view>
    <div class="container-notification"> 
        <div class="container-top">
            <img class="notification-img" src="images/notification.png">
            <h4>Notification</h4>
            <img class="messenger-img" src="images/messenger.png">
        </div>

        <div class="container-body" v-for="nontification in nontifications" :key="nontification.id">
            <div class="small-container-body">
            <div class="body-left">
                <img:src="nontification.images">
                <img :src="nontification.img">
            </div>
             <div class="body-center">
                 <h4><b>{{nontification.name}}</b></h4>
                 <h6>{{nontification.content}}</h6>
                 <h5>{{nontification.content}}</h5>
             </div>
              <div class="body-right">
                  <h6>5 mins ago</h6>
              </div>
            </div>
        </div>

        <div class="container-bottom">
            <h4>Hiển thị tất cả các tin nhắn</h4>
        </div>
    </div>
</div>
</template>
<script>
import axios from 'axios'
export default {
  data() {
    return {
        nontifications:[],
       
    }
  },
  created(){
      this.getNonti();
  },
   methods: {
       getNonti(){
        this.id=this.$route.params.id;
        axios.get("http://127.0.0.1:8000/api/nofication/"+this.id).then((response) => {
        this.nontifications = response.data;
      })
        
       }
    }
}
</script>
<style scoped>
.container-notification{
    width: 450px;
    height: 580px;
    border: 1 solid #fff;
    border-radius: 5px;
    margin: 10% 0 0 40%;
    background-color: #fff;
    overflow: auto;
}
.container-top{
    display: flex;
    width: 100%;
    justify-content: space-between;
    padding: 20px;
}
.body-left img{
    width: 50px;
    height: 50px;
    border-radius: 30px;
    margin: 15px 0 0 10px;
}
.body-center{
    margin: 15px 0 0 -80px;
    text-align: left;
    width: 40%;
}
/* .body-center h4{
    color: #d4a0a0;
} */
.body-center h6{
    opacity: 0.5;
}
.body-right h6{
    margin: 10px 5px 0 5px;
}
.notification-img{
    width: 20px;
    height: 20px;
    margin-left: 15px;
}
.messenger-img{
    width: 20px;
    height: 20px;
    margin-right: 15px;
}
.container-body{
    display: block;
   
}
.small-container-body{
    display: flex;
    width: 100%;
    height: 90px;
    justify-content: space-between;
    border: 0px solid;
    border-left: hidden;
    border-right: hidden; 

}
.container-bottom h4{
    text-align: center;
    margin: 20px;
}

</style>