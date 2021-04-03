<template >
<div class="container">
    <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="images/GiftBox.jpg" alt="logo" />
            <h1>GiftLove</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>
        <div class="sidebar__menu">
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-home"></i>
            <router-link to="/">Trang quản lý</router-link>
          </div>
          <div class="sidebar__link">
            <i class="fas fa-gift"></i>
            <router-link to="/product">Quản lý sản phẩm</router-link>
          </div>
          <div class="sidebar__link">
           <i class="fas fa-user"></i>
           <router-link to="/user">Quản lý người dùng</router-link>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-wrench"></i>
            <router-link to="/statistic">Thống kê</router-link>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-archive"></i>
            <router-link to="/order">Quản lý đơn hàng</router-link>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-handshake-o"></i>
            <a href="#">Liên Hệ</a>
          </div>
           <div class="sidebar__link">
            <i class="fas fa-bell"></i>
            <a href="#">Thông báo</a>
          </div> <div class="sidebar__link">
            <i class="far fa-id-card"></i>
            <router-link to="/profile">Thông tin cá nhân</router-link>
          </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="#">Đăng xuất</a>
          </div>
        </div>
      </div>
      <div class="sidebar-content">
         <router-view></router-view>
      </div>
</div>
</template>
<script>
export default {

}
</script>
<style lang="css">

</style>
