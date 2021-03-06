<template>
      <main>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->
          <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>Hello Codersbite</h1>
              <p>Welcome to your admin dashboard</p>
            </div>
          </div>
          <div class="main__cards">
            <div class="card register">
              <i
                class="fa fa-user-o fa-2x text-lightblue"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Số người đăng ký</p>
                <span class="font-bold text-title">578</span>
              </div>
            </div>
            <div class="card product">
              <i class="fas fa-gift" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Số lượng sản phẩm</p>
                <span class="font-bold text-title">2467</span>
              </div>
            </div>
            <div class="card review">
              <i class="fas fa-comment" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Số lượng đánh giá</p>
                <span class="font-bold text-title">340</span>
              </div>
            </div>
            <div class="card heart">
              <i class="fas fa-grin-hearts" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Số lượng yêu thích</p>
                <span class="font-bold text-title">645</span>
              </div>
            </div>
          </div>
          <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Doanh số bán hàng qua các tháng</h1>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
              <div id="apex1">
                  <lineChart />
              </div>
            </div>
            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Doanh số bán hàng qua các năm</h1>
                </div>
              </div>
              <div id="apex1">
                  <barChart />
              </div>
            </div>
          </div>
        </div>
      </main>
</template>
<script>
import barChart from './BarChart.vue';
import lineChart from './LineChart.vue';
export default {
 name: 'app',
    data(){
        return{
            msg:'Hello Vuejs'
        }
    },
    components:{
         barChart,
         lineChart
    }
}
</script>
<style lang="scss">
    .card .fas.fa-gift{
        font-size: 35px;
        color:rgb(13, 153, 83);
    }
    .card .fas.fa-comment{
        font-size: 35px;
        color: purple;
    }
    .card .fas.fa-grin-hearts{
        font-size: 35px;
        color: orangered;
    }
    .card.heart{
     background-image: linear-gradient(to right,#79e8b2, #FBD786);
    }
    .card.heart:hover{
    transition: all 0.3s;
     background-image: linear-gradient(to right,#FBD786,#79e8b2);
     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .card.register{
     background-image: linear-gradient(to right,#e39d7b, #f5b8ce);
    }
    .card.register:hover{
    transition: all 0.3s;
     background-image: linear-gradient(to right,#f5b8ce,#e39d7b);
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .card.product{
     background-image: linear-gradient(to right, #c471ed, #ee9ca7);
    }
    .card.product:hover{
        transition: all 0.3s;
     background-image: linear-gradient(to right, #ee9ca7,#c471ed);
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .card.review{
     background-image: linear-gradient(to right, #74c7d6, #C6FFDD);
    }
     .card.review:hover{
         transition: all 0.3s;
     background-image: linear-gradient(to right, #C6FFDD,#74c7d6);
     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>
