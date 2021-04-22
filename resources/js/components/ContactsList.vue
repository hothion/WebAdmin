<template>
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
<style lang="scss" scoped>

</style>