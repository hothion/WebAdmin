<template>
      <main>
        <div class="main__container">
          <div class="main__product">
            <div class="card_pro0">
                <img src="https://i.pinimg.com/originals/5e/22/6d/5e226d1e38cf656db5cfc0e20dd4ccd4.jpg" alt="">
            </div>
            <div class="card_pro2">
                <p class="text-primary-p">Hoa cuc</p>
                <span class="font-bold text-title">loại 1</span>
                <p>sdgdddddddddddddddklcvcmbmcv,bmv,bb.,cv.bn.vcbnbv</p>
                <span class="font-bold text-title"><p>100000đ</p><p>-30%</p></span>
            </div>
            <div class="card_pro3">
              <div class="action">
               <button>Add</button>
               <span class="edit-dele"><button>Edit</button> <button>Delete</button></span>
              </div>
            </div>
          </div>
        </div>
      </main>
</template>
<script>
export default {

}
</script>
<style lang="scss">
.main__product {
  display: grid;
  grid-template-columns: 1fr 2fr 2fr;
  gap: 30px;
  margin: 20px 0;
  .card_pro0{
      background: cadetblue;
      width: 100%;
      img{
          width:150px;
          height: 150px;
      }
  }
   .card_pro2{
      background: cadetblue;
  }
   .card_pro3{
      background: cadetblue;
      height: auto;
      .action{
          float: right;
         .edit-dele{
             margin-top: 90%;
         }
      }
  }
}

</style>
