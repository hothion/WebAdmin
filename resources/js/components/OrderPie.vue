<script>
import { Pie } from "vue-chartjs";

export default {
  extends: Pie,
  data() {
    return {
    };
  },
  mounted() {
    this.gradient = this.$refs.canvas
      .getContext("2d")
      .createLinearGradient(0, 0, 0, 450);
    this.gradient2 = this.$refs.canvas
      .getContext("2d")
      .createLinearGradient(0, 0, 0, 450);

    this.gradient.addColorStop(0, "rgba(255, 0,0, 0.5)");
    this.gradient.addColorStop(0.5, "rgba(255, 0, 0, 0.25)");
    this.gradient.addColorStop(1, "rgba(255, 0, 0, 0)");

    this.gradient2.addColorStop(0, "rgba(0, 231, 255, 0.9)");
    this.gradient2.addColorStop(0.5, "rgba(0, 231, 255, 0.25)");
    this.gradient2.addColorStop(1, "rgba(0, 231, 255, 0)");
    fetch("https://givinggift.000webhostapp.com/api/order_pieChart")
      .then((response) => response.json())
      .then((data) => {
        const cate_quantity = data;
    let cate=[];
    let quantity=[];
    for(var i=0; i< cate_quantity.length;i++){
      cate.push(cate_quantity[i].name);
      quantity.push(cate_quantity[i].total_quantity);
    }
    this.renderChart(
      {
        labels: cate,
        datasets: [
          {
            backgroundColor: [this.gradient, "#DCDCDC", this.gradient2,"orange"],
            data: quantity
          }
        ]
      },
      { responsive: true, maintainAspectRatio: false }
    );
    });
  }

};
</script>
