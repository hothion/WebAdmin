<template>
<main>
  <div class="product">
    <div class="pro_header">
      <h1>Danh sách sản phẩm</h1>
    </div>
    <div class="table_product">
        <div class="pro_img">
              <img src="https://i.pinimg.com/564x/72/9c/96/729c966483944050f60a3f5f4ba6588b.jpg" alt="">
        </div>
        <div class="pro_content">
           <h2> Hoa Hong (Loại 1)</h2>
           <h4>Giá: 200k( Giảm 30%)</h4>
           <h4>In this post, I’ll show you how to Upload File/Image to Server with Form Data in React Native.
               This example will cover how to pick any file from the file system and upload it to the server.
               In this post, I’ll show you how to Upload File/Image to Server with Form Data in React Native.
               In this post, I’ll show you how to Upload File/Image to Server with Form Data in React Native.
               In this post, I’ll show you how to Upload File/Image to Server with Form Data in React Native.
               In this post, I’ll show you how to Upload File/Image to Server with Form Data in React Native.
               In this post, I’ll show you how to Upload File/Image to Server with Form Data in React Native.
               In this post, I’ll show you how to Upload File/Image to Server with Form Data in React Native.
               </h4>
        </div>
        <div class="pro_action">
            <div id="add_product">
           <button >Add</button>
            </div>
            <div id="EditDele_product">
            <a href="#open-modal" >
                <button @click.prevent="editProduct(product)"> <i class="fas fa-edit"> </i></button>
            </a>
            <a  @click.prevent="deleteProduct(product.id)">
              <i class="fas fa-trash-alt"></i>
            </a>
            </div>
        </div>
    </div>
  </div>
</main>
</template>
<script>
export default {
  data() {
    return {
      products: [],
      newproduct: {},
      pageSize: 5,
      currentPage: 1,
      page: 1,
      perPage: 4,
      pages: [],
      search: null,
      edit:false,
      buttonAdd:"Thêm",
      contentForm: "Thêm sản phẩm mới"
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
     deleteProduct(id) {
       axios.delete(`${process.env.MIX_GIFS_API_HOST}/api/products_delete/${id}`);
       this.getData();
     },

    addProduct() {
    if(this.edit==false){
       axios.post(`${process.env.MIX_GIFS_API_HOST}/api/products_store`, this.newproduct);
       alert(" Insert product success");
       this.getData();
    }else{
        axios.patch(`${process.env.MIX_GIFS_API_HOST}/api/products_update/${this.newproduct.id}`, this.newproduct);
        alert(" Update product success");
        this. getData();
    }
    },
    editProduct(product){
        this.edit = true;
        this.buttonAdd ="Cập nhật";
        this.contentForm ="Cập nhật sản phẩm";
        this.newproduct.id = product.id;
        this.newproduct.name = product.name;
        this.newproduct.img = product.img;
        this.newproduct.desciption = product.desciption;
        this.newproduct.type = product.type;
        this.newproduct.quantity = product.quantity;
        this.newproduct.heart = product.heart;
        this.newproduct.discount = product.discount;
    },
    setPages() {
      let numberOfPages = Math.ceil(this.products.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    clearData(){
        this.buttonAdd ="Thêm";
        this.contentForm = "Thêm sản phẩm mới";
        this.id = "";
        this.name = "";
        this.img =  "";
        this.desciption =  "";
        this.type =  "";
        this.quantity =  "";
        this.heart = 0;
        this.discount =  "";
    },
    paginate(products) {
      let page = this.page;
      let perPage = this.perPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return products.slice(from, to);
    },
  },
  computed: {
    showProducts() {
      if (this.search) {
        return this.products.filter((item) => {
          return this.search
            .toLowerCase()
            .split(" ")
            .every((v) => item.name.toLowerCase().includes(v));
        });
      } else {
        return this.paginate(this.products);
      }
    },
  },
  watch: {
    products() {
      this.setPages();
    },
  },
  filters: {
    trimWords(value) {
      return value.split(" ").splice(0, 20).join(" ") + "...";
    },
  },
};
</script>
<style lang="scss">
.product {
  width: 100%;
    .table_product{
    background: aquamarine;
    width: 90%;
    height: 150px;
    display: flex;
    }
}
.pro_img{
  width: 20%;
  img{
        width: 75%;
        height: 65%;
    }
}
.pro_content{
width: 75%;
h4{
    width: 60%;
    height: auto;
}
}
.pro_action{
width: 15%;
}
#EditDele_product{
    margin-top: 70%;
    a {
        background-color: crimson; /* Màu của Quản trị mạng ^^ */
        border: none;
        color: white;
        padding: 5px 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        width: 30%;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 4px;
    }
    a:hover {
         background-color: seagreen;
    }
}

</style>
