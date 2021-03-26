
<script>
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,
    data() {
    return {
      gradient: null,
      gradient2: null,
    };
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
            let day = ['Monday','Tuesday','Wenesday','Thursday','Friday','Satarday','Sunday'];
            let cate=[];
            let quantity=[];
            for(var i=0; i< order_week.length; i++){
            cate.push(order_week[i].dayname);
            quantity.push(order_week[i].total_quantity);
            }
        this.renderChart(
          {
            labels: cate,
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
