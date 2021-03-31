<template>
  <main>
    <div class="main__container">
      <div class="header_pro">
        <input
          class="form-control"
          type="text"
          v-model="search"
          placeholder=" Nhập tên sản phẩm ....."
        />
        <p></p>
        <button>Thêm sản phẩm</button>
      </div>
      <div class="main__product">
        <div class="card_pro0">
          <img
            src="https://i.pinimg.com/originals/5e/22/6d/5e226d1e38cf656db5cfc0e20dd4ccd4.jpg"
            alt=""
          />
        </div>
        <div class="card_pro2">
          <p class="text-primary-p">Hoa cuc</p>
          <span class="font-bold text-title">loại 1</span>
          <p>sdgdddddddddddddddklcvcmbmcv,bmv,bb.,cv.bn.vcbnbv</p>
          <span class="font-bold text-title"
            ><p>100000đ</p>
            <p>-30%</p></span
          >
        </div>
        <div class="card_pro3">
          <div class="action">
            <div class="edit-dele">
              <button>Edit</button>
              <button>Delete</button>
            </div>
          </div>
        </div>
               <div class="card_pro0">
          <img
            src="https://i.pinimg.com/originals/5e/22/6d/5e226d1e38cf656db5cfc0e20dd4ccd4.jpg"
            alt=""
          />
        </div>
        <div class="card_pro2">
          <p class="text-primary-p">Hoa cuc</p>
          <span class="font-bold text-title">loại 1</span>
          <p>sdgdddddddddddddddklcvcmbmcv,bmv,bb.,cv.bn.vcbnbv</p>
          <span class="font-bold text-title"
            ><p>100000đ</p>
            <p>-30%</p></span
          >
        </div>
        <div class="card_pro3">
          <div class="action">
            <div class="edit-dele">
              <button>Edit</button>
              <button>Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<script>
export default {};
</script>
<style lang="scss">
.main__product {
  display: grid;
  grid-template-columns: 1fr 2fr 2fr;
  gap: 30px;
  margin: 20px 0;
    background: cadetblue;
  .card_pro0 {
    width: 100%;
    padding-top: 10px;
    img {
      width: 150px;
      height: 150px;
    }
  }

  .card_pro3 {
    height: auto;
    .action {
      float: right;
      .edit-dele {
        margin-bottom: 1px;
        button {
          background-color: crimson; /* Màu của Quản trị mạng ^^ */
          border: none;
          color: white;
          padding: 13px 18px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 100px 2px 0px 0px;
          -webkit-transition-duration: 0.4s; /* Safari */
          transition-duration: 0.4s;
          cursor: pointer;
          border-radius: 4px;
        }
        button:hover {
          background-color: seagreen;
        }
      }
    }
  }
}
.header_pro {
  display: grid;
  grid-template-columns: 2fr 1.5fr 1fr;
  button {
    background-color: crimson; /* Màu của Quản trị mạng ^^ */
    border: none;
    color: white;
    padding: 13px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    outline: none;
    border-radius: 25px;
  }
  button:hover {
    background-color: seagreen;
  }
  input {
    padding-left: 1%;
    outline: none;
    border-radius: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
}
</style>
