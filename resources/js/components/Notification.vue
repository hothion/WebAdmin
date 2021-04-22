<template>
<div>
<router-view></router-view>
    <div class="container-notification"> 
        <div class="container-top">
            <img class="notification-img" src="images/notification.png">
            <h4>Notification</h4>
            <img class="messenger-img" src="images/messenger.png">
        </div>

        <div class="container-body">
            <div class="small-container-body">
            <div class="body-left">
                <img src="images/a2.jpg">
            </div>
             <div class="body-center">
                 <h4><b>Văn Hậu</b></h4>
                 <h6>Văn Hậu đã bình luận sản phẩm của bạn</h6>
                 <h5>Sản phẩm quá đẹp...</h5>
             </div>
              <div class="body-right">
                  <h6>5 mins ago</h6>
              </div>
            </div>
            <div class="small-container-body">
            <div class="body-left">
                <img src="images/a3.jpg">
            </div>
             <div class="body-center">
                 <h4><b>Người đi bán nắng</b></h4>
                 <h6>Người đi bán nắng đã thích ảnh của bạn</h6>
                 <h5>Ai mà dễ thương vx ta???</h5>
             </div>
              <div class="body-right">
                  <h6>5 mins ago</h6>
              </div>
            </div>
            <div class="small-container-body">
            <div class="body-left">
                <img src="images/a4.jpg">
            </div>
             <div class="body-center">
                 <h4><b>Ken</b></h4>
                 <h6>Ken đã bình luận ảnh của bạn</h6>
                 <h5>Ai mà dễ thương vx ta???</h5>
             </div>
              <div class="body-right">
                  <h6>5 mins ago</h6>
              </div>
            </div>
            <div class="small-container-body">
            <div class="body-left">
                <img src="images/a5.jpg">
            </div>
             <div class="body-center">
                 <h4><b>Xắc</b></h4>
                 <h6>Xắc đã bình luận ảnh của bạn</h6>
                 <h5>Ai mà dễ thương vx ta???</h5>
             </div>
              <div class="body-right">
                  <h6>5 mins ago</h6>
              </div>
            </div>
            <div class="small-container-body">
            <div class="body-left">
                <img src="images/a6.jpg">
            </div>
             <div class="body-center">
                 <h4><b>Phan see</b></h4>
                 <h6>Phan see đã bình luận ảnh của bạn</h6>
                 <h5>Ai mà dễ thương vx ta???</h5>
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

export default {
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