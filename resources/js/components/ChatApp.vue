<template>
  <div class="container-messenger">
     <div class="container-chat-left">
            <aside>
              <header>
                <h2>Chats</h2>
                <input type="text" placeholder="Tìm kiếm trên chat...">
              </header>
              <h2 style="margin-left: 20px;">Tin nhắn gần đây</h2>
              <ul >
                <li v-for="user in users" :key="user.id" v-on:click="sendselect(user.id_user)">
                  <div v-if="user.id_user !=1" class="lisstuser">
                    <img :src="user.images">
                    <span class="status green"></span>
                    <div class="nameUser">
                      <h2>{{ user.account }}</h2>
                      <h3>
                      {{ user.content }}
                      </h3>
                    
                    </div>
                    <div class="timechat">3:30 PM</div>
                  </div>           
                </li>
              </ul>
            </aside>
    </div>
    <div class="container-chat-center">
      <div class="msg-header">
        <div class="msg-header-img">
          <img src="/images/a2.jpg" />
        </div>
        <div class="active">
          <h4><b>hậu</b></h4>
          <h6>1 hour ago...</h6>
        </div>
        <div class="header-icons">
          <i class="fa fa-camera"></i>
          <i class="fa fa-microphone"></i>
          <i class="fa fa-close"></i>
        </div>
      </div>
      <div class="chat-page">
        <div class="msg-inbox">
          <div class="chats">
            <div class="msg-page" v-for="message in userProduct" :key="message.id">
              <div class="received-chats">
                <div class="received-chats-img">
                  <img :src="message.images">
                </div>
                <div class="received-msg">
                  <div class="received-msg-inbox">
                    <p>{{ message.content }}</p>
                    <span class="time">11:01 PM | October 11</span>
                  </div>
                </div>
              </div>
              <div class="outgoing-chats">
                <div class="outgoing-chats-msg">
                  <p>{{ message.content }} </p>
                  <span class="time">11:01 PM | October 11</span>
                </div>
                <div class="outgoing-chats-img">
                  <img :src="message.images">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="msg-bottom">
          <div class="bottom-icons">
            <i class="fa fa-plus-circle"></i>
          </div>
          <div class="input-group">
            <input
              class="form-control"
              v-model="newMessage"
              type="text"
              placeholder="write message..."
              name="message"
            />
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-paper-plane" @click="sendMessage"></i>
                <i class="fa fa-smile-o"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div style="width:20px">
      {{userProduct}}
    </div> -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      messages:[],
      newMessage: "",
      users: [],
      id_role: "",
      activeUser: false,
      typingTimer: false,
      userProduct:[]
      
    };
  },
  created() {
    this.fetchMessages();
  },
  methods: {
    fetchMessages() {
      axios.get("http://127.0.0.1:8000/api/getAdmin/1").then((response) => {
        this.users = response.data;
        this.messages = response.data;

      });
    },
    sendselect(id){
      localStorage.setItem("user_id",id);
       axios.get("http://127.0.0.1:8000/api/usermess/"+id ).then((response) => {
        this.userProduct = response.data;
         this.messages = response.data;
      
      });
    },
    sendMessage() {
      const id_ad = JSON.parse(localStorage.getItem("data"));
      const id_user = localStorage.getItem("user_id");
       let Mess = {
            content: this.newMessage,
            id_user: id_ad,
            id_admin: id_ad
        }
        let MessUser = JSON.stringify(Mess);
        axios({
          method: 'POST',
          url: `http://127.0.0.1:8000/api/getInsertMessageUserToShop`,
          data: MessUser,
          headers:{
            'Accept':'application/json',
            'Content-Type':'application/json', 
          }
          }).then((resp) => {
              console.log(resp);
          }
        ).catch(error => console.log(error));   
    },
  }
};
</script>

<style lang="scss" scoped>
.container-messenger {
  display: flex;
  margin-left: 300px;
  height: 1000px;
  width: 80%;
}
.container-chat-left {
  width: 75vh;
  height: 1000px;
  background: #efc7ca;
  margin: 0 20px 30px 50px;
  font-size: 0;
  border-radius: 5px;
}

aside {
  width: 100%;
  height: 1000px;
  background-color: #f1f6fb;
  display: inline-block;
  font-size: 15px;
  vertical-align: top;
}
aside header {
  padding: 20px 20px;
  line-height: 2;
}
aside input {
  width: 85%;
  height: 40px;
  outline: none;
  padding: 0 50px 0 20px;
  background-color: rgb(229, 239, 250);
  border: none;
  border-radius: 3px;
  color: #333;
  // background-image: url(./images/search.png);
  background-repeat: no-repeat;
  background-position: 360px;
  background-size: 25px;
}
::placeholder {
  color: black;
  opacity: 0.5;
  font-family: "Noto Serif", sans-serif;
  font-size: 1.2em;
}
aside ul {
  padding: 10px 0 30px 0;
  margin: 0;
  list-style-type: none;
  height: 690px;
}
aside li {
  background-color: #fff;
  transition: 1s cubic-bezier(0.65, 0.05, 0.36, 1);
}

.lisstuser{
  display: flex; 
  width: 95%;
  background-color: #fff;
  justify-content: space-between;
  border-radius: 10px;
  margin: 20px;
  padding: 15px 0 15px 0;
  transition: 1s cubic-bezier(0.65, 0.05, 0.36, 1);
}
.lisstuser:hover {
  background-color: #53b3d0;
  border: none;
  color: #fff;
  border-radius: 20px;
  transform: scale(2);
  -moz-transform: scale(1.5, 1);
  -webkit-transform: scale(1.5, 1);
  -o-transform: scale(1.5, 1);
  -ms-transform: scale(1.5, 1);
}
.nameUser {
  margin-left: -80px;
  font-family: Roboto;
}
.timechat {
  margin-right: 10px;
}
h2,
h3 {
  margin: 0;
}
aside li img {
  border-radius: 50%;
  margin-left: 20px;
  margin-right: 8px;
  width: 50px;
  height: 50px;
}
aside li div {
  display: inline-block;
  vertical-align: top;
  margin-top: 12px;
}
aside li h2 {
  font-size: 14px;
  color: black;
  font-weight: normal;
  margin-bottom: 5px;
}
aside li h3 {
  font-size: 12px;
  color: black;
  font-weight: normal;
}

.status {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  display: inline-block;
  margin-right: 7px;
}
.green {
  background-color: #58b666;
  margin: 40px 0 0 -125px;
}
.black {
  background-color: #7e818a;
}
.blue {
  background-color: #6fbced;
  margin-right: 0;
  margin-left: 7px;
}
.container-chat-center {
  width: 60%;
  height: 1000px;
  font-family: sans-serif;
  letter-spacing: 0.5px;
  display: grid;
  border-right: solid rgb(232 228 228);
  border-left: solid rgb(232 228 228);
  border-width: 0.1px;
}
img {
  max-width: 100%;
}
.msg-header {
  width: 95%;
  margin-left: 25px;
  border-radius: 10px;
  height: 90px;
  display: inline-block;
  background-color: #fff;
}
.msg-header-img {
  width: 60px;
  margin-left: 5%;
  margin-top: 12px;
  float: left;
}
.msg-header-img img {
  border-radius: 100%;
}
.active {
  width: 120px;
  line-height: 1em;
  float: left;
  margin-top: 20px;
}
.active h4 {
  font-size: 12px;
  color: rgb(56, 55, 55);
  margin-left: 10px;
  /* font-family: cursive; */
}
.active h6 {
  font-size: 10px;
  color: #777;
  margin-left: 10px;
}
.header-icons {
  width: 120px;
  float: right;
  margin-top: 25px;
  margin-right: 10px;
}
.header-icons .fa {
  color: #53b3d0;
  cursor: pointer;
  margin: 10px;
  height: 50px;
}
.chat-page {
  /* padding: 0 0 50px 0; */
  width: 100%;
  height: 780px;
}
.msg-inbox {
  border: none;
  overflow: hidden;
  padding-bottom: 0px;
  margin-top: -7px;
  height: 650px;
  border-radius: 0px 0px 0px 0px;
}
.close {
  width: 20px;
  height: 20px;
  margin-left: 535px;
  margin-top: 0px;
}
.chats {
  padding: 30px 15px 0 25px;
}
.msg-page {
  height: 516px;
}
.received-chats {
  height: 15%;
}
.received-chats-img {
  display: inline-block;
  width: 20px;
  float: left;
}
.received-chats-img img {
  border-radius: 10px;
}
.received-msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
}
.received-msg-inbox {
  width: 57%;
}
.received-msg-inbox p {
  background: #fff none repeat scroll 0 0;
  border-radius: 10px 10px 10px 0px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  height: 40px;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.received-msg-inbox .time {
  color: #777;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}

/* .time{
	color: #777;
	display: block;
	font-size: 12px;
	margin: 8px 0 0;
} */
.outgoing-chats {
  overflow: hidden;
  margin: 26px 20px;
  height: 15%;
}
.outgoing-chats-img {
  display: inline-block;
  width: 20px;
  float: right;
}
.outgoing-chats-img img {
  border-radius: 10px;
}
.outgoing-chats-msg p {
  background: #53b3d0 none repeat scroll 0 0;
  color: #fff;
  font-size: 14px;
  margin: 0;
  color: #fff;
  padding: 5px 10px 5px 12px;
  width: 100%;
  height: 40px;
  border-radius: 10px 10px 0px 10px;
}
.outgoing-chats-msg {
  float: left;
  width: 46%;
  margin-left: 45%;
}
.outgoing-chats-img {
  display: inline-block;
  width: 20px;
  float: right;
}
.outgoing-chats-msg .time {
  color: #777;
  display: block;
  font-size: 12px;
  margin: 8px 8px 0 0;
}
.msg-bottom {
  position: relative;
  display: flex;
  height: 90px;
  width: 95%;
  margin-left: 25px;
  border-radius: 10px;
  background-color: #fff;
}

.input-group {
  float: right;
  margin-left: -20px;
  margin-top: 15px;
  outline: none !important;
  border-radius: 20px;
  width: 61% !important;
  background-color: #fff;
}
.form-control {
  border: none !important;
  border-radius: 20px !important;
}
.input-group-text {
  background: transparent !important;
  border: none !important;
}
.input-group .fa {
  color: #53b3d0;
  float: right;
  margin: -10px 15px 10px 0;
}
.input-group .form-control {
  outline: none;
  margin: 22px 0px 0px -90px;
}
.bottom-icons {
  float: left;
  margin-top: 17px;
  width: 30% !important;
  margin-left: 20px;
}
.bottom-icons .fa {
  color: #53b3d0;
  padding: 5px;
  margin-top: 15px;
}
.form-control:focus {
  border-color: none !important;
  box-shadow: none !important;
  border-radius: 20px;
}
#profile-image1 {
  max-width: 10%;
  margin: 6px 150px;
}
.container-chat-right {
  margin-left: 10px;
  margin-top: 57px;
}
.col-image {
  background-color: #e2c3c3;
  width: 50%;
}
.container-name h4 {
  margin: auto 150px;
}
.container-name p {
  margin: auto 140px;
}
.sendMessage {
  margin-right: 20px;
  background: red;
}

</style>