<template>
  <div>
    <div row>
      <div class="text-center font-weight-black">
        <h1>Upload a photo</h1>
      </div>
    </div>

   
    <div row>
      <div  md6 offset-sm3 >
       <div>
         <div >
           <button @click="click1">choose photo</button>
           <input type="file" ref="input1"
            style="display: none"
            @change="previewImage" accept="image/*" >                
         </div>
 
       <div v-if="imageData!=null">                     
          <img class="preview" height="268" width="356" :src="img1">
       <br>
       </div>   
      
       </div>
       </div>
    </div>


    <div row>
      <div md6 offset-sm3 class="text-center">
        <input
        solo
        v-model="caption"
        label="Caption goes here">
      </div>
    </div>
    <div row>
      <div class="text-center">
        <button color="pink" @click="click2">upload</button>
      </div>
    </div>
  </div>
</template>


<script>
// import firebase from 'firebase';
import firebase from "firebase/app";
import "firebase/storage";

export default {
  data () {
    return {
      caption : '',
      img1: '',
      imageData: null
    }
  },
  methods: {
    create () {
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
        // firebase.analytics();
    //   const post = {
    //     photo: this.img1,
    //     caption: this.caption        
    //   }
    //   firebase.database().ref('PhotoGallery').push(post)
    //   .then((response) => {
    //     console.log(response)
    //   })
    //   .catch(err => {
    //     console.log(err)
    //   })
    },
    click2() {
    const post = {
        photo: this.img1,
        caption: this.caption        
      }
      console.log(post);
      firebase.database().ref('PhotoGallery').push(post)
      .then((response) => {
        console.log(response)
      })
      .catch(err => {
        console.log(err)
      })
    },
  click1(e) {
  this.$refs.input1.click()   
},
previewImage(event) {
  this.uploadValue=0;
  this.img1=null;
  this.imageData = event.target.files[0];
  this.onUpload()
},
onUpload(){
  this.img1=null;
  const storageRef=firebase.storage().ref(`${this.imageData.name}`).put(this.imageData);
  console.log(storageRef);
  storageRef.on(`state_changed`,snapshot=>{
  this.uploadValue = (snapshot.bytesTransferred/snapshot.totalBytes)*100;
    }, error=>{console.log(error.message)},
  ()=>{this.uploadValue=100;
      storageRef.snapshot.ref.getDownloadURL().then((url)=>{
          this.img1 =url;
          console.log(this.img1)
        });
      }      
    );
 },
  }
}
</script>