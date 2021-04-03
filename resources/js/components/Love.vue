<template>
  <main>
    <div class="main__container">
      <div class="header_pro">
        <input class="form-control" type="text" v-model="search" placeholder=" Nhập tên sản phẩm ....." />
        <p></p>
        <button>Thêm sản phẩm</button>
      </div>
      <div class="main__product" v-for="product in products" :key="product.id">
        <div class="card_pro0">
          <img :src="product.img" id="img" alt="image" />
        </div>
        <div class="card_pro2">
          <p class="text-primary-p">{{ product.name }}</p>
          <span class="font-bold text-title">{{ product.name }}</span>
          <p>{{ product.desciption }}</p>
          <span class="font-bold text-title">
            <p>{{ product.price }} đ</p>
            <p>- {{ product.discount }}%</p>
          </span>
        </div>
        <div class="card_pro3">
          <div class="action">
            <div class="edit-dele">
              <button><i class="fas fa-edit"></i></button>
              <button> <i class="fas fa-trash-alt"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- <hr style="width: 100%; float: left; border: 5px solid rebeccapurple; border-radius: 20px;"> -->

    </div>
  </main>
</template>
<script>
  export default {
    data() {
    return {
      products: [],
      newproduct: {
           img : null,
          imageUrl: null
      },
      pageSize: 5,
      currentPage: 1,
      page: 1,
      perPage: 4,
      pages: [],
      search: null,
      edit: false,
      buttonAdd: "Thêm",
      contentForm: "Thêm sản phẩm mới",
    };
  },
  created() {
    this.getData();
  },
  methods: {
    getData() {
          fetch(`${process.env.MIX_GIFS_API_HOST}/api/products`)
        .then((response) => response.json())
        .then((data) => (this.products = data));
    },
  }

  };
</script>
<style lang="scss">
  .main__container{
    width: 100%;
  }
  .main__product {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 2fr 2fr;
    gap: 30px;
    margin: 20px 0;
    background:white;
    /* background: cadetblue; */
    box-shadow: 10px 10px 20px 10px rgba(0, 0, 0, 0.10), 10px 6px 20px 10px rgba(0, 0, 0, 0.19);
    .card_pro0 {
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
            background-color: crimson;
            /* Màu của Quản trị mạng ^^ */
            border: none;
            color: white;
            padding: 13px 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 100px 2px 0px 0px;
            -webkit-transition-duration: 0.4s;
            /* Safari */
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
      background-color: crimson;
      /* Màu của Quản trị mạng ^^ */
      border: none;
      color: white;
      padding: 13px 18px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      -webkit-transition-duration: 0.4s;
      /* Safari */
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