<template>
<div class="statistic">
    <div class="LineChart">
        <productChart />
    </div>
    <div class="LineChart">
        <orderBar />
    </div>
</div>
</template>
<script>
import productChart from './ProductChart.vue';
import orderBar from './OrderBar.vue';
export default {
 name: 'app',
    data(){
        return{
            msg:'Hello Vuejs'
        }
    },
    components:{
         productChart,
         orderBar
    },

}
</script>
<style lang="scss">

</style>
