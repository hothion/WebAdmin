<template>
    <div>
        <ul>
            <li> <router-link to="/statistic">Đơn hàng ( tháng + ngày)</router-link></li>
            <li> <router-link to="/product_chart">Sản phẩm</router-link></li>
            <li> <router-link to="/chart_week">Đơn hàng theo tuần</router-link></li>
        </ul>
    </div>
    <div>
        <router-view></router-view>
    </div>
</template>
