<template>
	<div class="container">
		<div class="msg-header">
			<div class="msg-header-img">
				<img src="images/avatar.jpg">
		</div>
		<div class="active">
			<h4> Yeuho</h4>
			<h6> 1 hour ago...</h6>
		</div>
		<div class="header-icons">
			<i class="fa fa-phone"></i>
			<i class="fa fa-video-camera"></i>
			<i class="fa fa-info-circle"></i>
		</div>
		</div>
		<div class="chat-page">
			<div class="msg-inbox"> 
				<div class="chats"> 
					<div class="msg-page">
						<div class="received-chats"> 
							<div class="received-chat-img"> 
								<img src="images/avatar.jpg">
							</div>
							<div class="received-msg"> 
								<div class="received-msg-inbox"> 
								<p>Hi!! </p>
								<span class="time">11:01 PM | October 11</span>
							</div>
							</div>
						</div>
						 </div>
				</div>
			</div>
			 </div>
	</div>
</template>
<style scoped>
.container{
    max-width: 100 !important;
    margin: auto;
	margin-top: 4%;
	font-family: sans-serif;
	letter-spacing: 0.5px;
}
img{
    max-width: 100%;
}
.msg-header[data-v-0d66c37a] {
    border: 1px solid #ccc;
    width: 20%;
    height: 10%;
    border-bottom: none;
    display: inline-block;
    background-color: #007bff;
}
.msg-header-img{
border-radius: 50%;
width: 40px;
margin-left: 5%;
margin-top: 12px;
float: left;
}
.active{
	width: 120px;
	float: left;
	margin-top: 10px;
}
.active h4{
	font-size: 20px;
	color: #fff;
	margin-left: 10px;
}
.active h6{
	font-size: 20px;
	color: #fff;
	margin-left: 10px;
}
.header-icons{
	width: 120px;
	float: right;
	margin-top: 12px;
	margin-right: 10px;
}
.header-icons .fa{
	color: #fff;
	cursor: pointer;
	margin: 10px;
}
</style>