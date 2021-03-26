
<script>
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,
  props:{
     listDay: {
         type: Array,
         default:[]
     }
  },
    data() {
    return {
      gradient: null,
      gradient2: null,
      found:[]
    };
  },
  created(){
console.log(this.listDay.length);
var array1 = ["cat", "sum","fun", "run",'sun','yeu','love','nice','yyy','tfrt'];
var array2 = ["bat", "cat","sun", "hut", "gut",'yyy'];
var str='';
for(var i=0;i<array1.length;i++){
        if(array2.indexOf(array1[i]) != -1){
           str+=array1[i]+' ';
       };
    }
console.log(str)

  },
  mounted() {
    this.gradient = this.$refs.canvas
      .getContext("2d")
      .createLinearGradient(0, 0, 0, 450);

    this.gradient.addColorStop(0, "rgba(255, 99, 71, 0.8)");
    this.gradient.addColorStop(0.5, "rgba(255, 99, 71, 0.6)");
    this.gradient.addColorStop(1, "rgba(255, 99, 71, 0.4)");

    fetch(`${process.env.MIX_GIFS_API_HOST}/api/weekChart`)
      .then((response) => response.json())
      .then((data) => {
        const order_week = data;
            let day = ['2021-03-13','2021-03-14','2021-03-15','2021-03-18','2021-03-19'];
            let cate=[];
            let quantity=[];
            for(var i=0; i< order_week.length; i++){
               for( var j = 0; j < day.length; j++){
                if(order_week[i].date == day[i]){
                    quantity.push(order_week[i].total_quantity);
                }
               }
            }
        this.renderChart(
          {
            labels: this.listDay,
            datasets: [
              {
                label: "Đơn hàng",
                backgroundColor: this.gradient,
                data:quantity,
              },
            ],
          },
          { responsive: true, maintainAspectRatio: false }
        );
      });
  },
};
</script>
<style lang="scss">
   #bar-chart{
       width: 400px;
   }
</style>
