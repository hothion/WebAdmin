<template>
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
      <!-- <div class="chat-page">
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
      </div> -->
    <div class="chat-page">
        <div class="msg-inbox">
          <div class="chats">
            <div class="msg-page" v-for="message in messages" :key="message.id">
              <div class="received-chats" v-if="messages.user_id == id_us">
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
              <div class="outgoing-chats" v-else>
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
    this.id_us= localStorage.getItem("user_id");
    this.id_ad = JSON.parse(localStorage.getItem("data"));
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
</script>