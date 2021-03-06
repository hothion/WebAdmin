<template>
    <div class="container-profile">
        <div class="container-profile-top">
            <div class="profile-image">
                 <img class="avata" src="images/avatar.jpg">
                 <a href="#"><img src="images/edit.png" class="edit-img"></a>
            </div>
             <div class="text-profile">
            <h4>On ho</h4>
            <h6>Admin</h6>
        </div>
        </div>
    
        <div class="container-profile-bottom">
           <form class="save-form" @submit.prevent="onSubmit" method="post">
            <div class="form-top">
                    <div class="form-top-firtsname">
                        <input type="text" class="form-control" placeholder="first name">
                    </div>
                    <div class="form-top-fullname">
                        <input type="text" class="form-control" placeholder="Full name">
                    </div>
            </div>  
            <div class="form-top">
                    <div class="form-top-firtsname">
                        <input type="text" class="form-control" placeholder="first name">
                    </div>
                    <div class="form-top-fullname">
                        <input type="text" class="form-control" placeholder="Full name">
                    </div>
            </div>  
            <div class="form-top">
                    <div class="form-top-firtsname">
                        <input type="text" class="form-control" placeholder="first name">
                    </div>
                    <div class="form-top-fullname">
                        <input type="text" class="form-control" placeholder="Full name">
                    </div>
            </div>  
            </form>
        </div>
    </div>
</template>
<script>
export default {

}
</script>
<style lang="css">
.container-profile{
    margin: 5px 20px 5px 20px;
    border-radius: 2px;
    width: 550px;
    height: 400px;
    box-shadow: 2px 1px 5px 2px rgb(68 68 68 / 40%);
    
}
.container-profile-top{
    display: flex;
    flex-direction: column column;
    margin: 100px 200px 30px 170px;
}
.container-profile-top img{
    width: 50px;
    height: 50px;
    border-radius: 22px;
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
.text-profile{
margin: 25px 10px 5px 10px;
margin-top: 20px;
}
.text-profile h6{
    opacity: 0.6;
    font-family: cursive;
}
.container-profile-bottom{
display: flex;
flex-direction: column;
}
.save-form{
line-height: 2.5;
}

.form-top {
    display: flex;
    /* flex-direction: column column; */
    margin-left: 80px;
    width: 70%;
    justify-content: space-between;
}
.form-top-firtsname, .form-top-fullname{
border-radius: 2px;
box-shadow: 1px 1px 1px 1px rgba(50, 50, 50, 0.4);
}
.form-control{
   height: 30px;
   font-weight: bold;
   outline: none;
}
.form-top .labels{
   margin-left:80px ; 
}
.form-top div{
    margin-top: 20px;
}
</style>