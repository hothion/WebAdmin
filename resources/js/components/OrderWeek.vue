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

    fetch("http://127.0.0.1:8000/api/weekChart")
      .then((response) => response.json())
      .then((data) => {
        const order_week = data;
        this.renderChart(
          {
            labels: [
              "Thứ Hai",
              "Thứ Ba",
              "Thứ Tư",
              "Thứ Năm",
              "Thứ Sáu",
              "Thứ Bảy",
              "Chủ Nhật"
            ],
            datasets: [
              {
                label: "Đơn hàng",
                backgroundColor: this.gradient,
                data:order_week,
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
