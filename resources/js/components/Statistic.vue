<template>
<div class="statistic">
    <h1>Thống kê </h1>
<div class="col1">
    <div class="LineChart">
        <h3> Người đăng ký và lượng sản phẩm qua các tháng</h3>
        <productChart />
    </div>
    <div class="BarChart">
        <h3> Đơn đặt hàng qua các tháng</h3>
        <orderBar />
    </div>
</div>
    <div class="PieChart">
        <orderPie />
    </div>
     <div class="PieChart">
        <orderWeek />
    </div>
</div>
</template>
<script>
import productChart from './ProductChart.vue';
import orderBar from './OrderBar.vue';
import orderPie from './OrderPie.vue';
import orderWeek from './OrderWeek.vue';
export default {
 name: 'app',
    data(){
        return{
            msg:'Hello Vuejs'
        }
    },
    components:{
         productChart,
         orderBar,
         orderPie,
         orderWeek
    },

}
</script>
<style lang="scss">
.statistic{
    width: 100%;
}
.col1{
    width: 100%;
    display: flex;
    margin-left: 5%;
    margin-top: 4%;
    .LineChart{
        width: 80%;
    }
    .BarChart{
        width: 80%;
        margin-left: 3%;
    }
}
.statistic h1{
    box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2), 0 0px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
