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

    fetch("https://givinggift.000webhostapp.com/api/order_barchart")
      .then((response) => response.json())
      .then((data) => {
        const order_month = data;
        this.renderChart(
          {
            labels: [
              "Tháng 1",
              "Tháng 2",
              "Tháng 3",
              "Tháng 4",
              "Tháng 5",
              "Tháng 6",
              "Tháng 7",
              "Tháng 8",
              "Tháng 9",
              "Tháng 10",
              "Tháng 11",
              "Tháng 12",
            ],
            datasets: [
              {
                label: "Đơn hàng",
                backgroundColor: this.gradient,
                data:order_month,
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
