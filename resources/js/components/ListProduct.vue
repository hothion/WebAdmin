<template>
  <div class="product">
    <div class="pro_header">
      <h1>Danh sách sản phẩm</h1>
    </div>
<div class="pro_table">
      <table>
        <tr>
          <th colspan="9">
            <input
              class="form-control"
              type="text"
              v-model="search"
              placeholder=" Nhập tên sản phẩm ....."
            />
          </th>
          <th colspan="10" id="add">
            <a href="#open-modal"
              ><button @click.prevent="clearData">+</button></a
            >
          </th>
        </tr>
        <tr>
          <th>STT</th>
          <th>Tên sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Loại</th>
          <th>Mô tả</th>
          <th>Giá</th>
          <th>Giảm giá(5)</th>
          <th>Số lượng</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
        <tr v-for="product in showProducts" :key="product.id">
          <td>{{ product.id }}</td>
          <td>{{ product.name }}</td>
          <td><img :src="product.img" id="img" alt="image" /></td>
          <td>{{ product.type }}</td>
          <td>{{ product.desciption }}</td>
          <td>{{ product.price }}</td>
          <td>{{ product.discount }}</td>
          <td>{{ product.quantity }}</td>
          <td id="edit">
            <a href="#open-modal">
              <button @click.prevent="editProduct(product)">
                <i class="fas fa-edit"> </i>
              </button>
            </a>
          </td>
          <td>
            <a @click.prevent="deleteProduct(product.id)">
              <i class="fas fa-trash-alt"></i>
            </a>
          </td>
        </tr>
      </table>
      <div id="navigation">
        <ul class="pagination">
          <li class="page-item">
            <button
              type="button"
              class="page-link"
              v-if="page != 1"
              @click="page--"
            >
              Previous
            </button>
          </li>
          <li class="page-item">
            <button
              type="button"
              class="page-link"
              v-for="pageNumber in pages.slice(page - 1, page + 5)"
              @click="page = pageNumber"
            >
              {{ pageNumber }}
            </button>
          </li>
          <li class="page-item">
            <button
              type="button"
              @click="page++"
              v-if="page < pages.length"
              class="page-link"
            >
              Next
            </button>
          </li>
        </ul>
      </div>
    </div>
    <div id="open-modal" class="modal-window-product">
      <div class="form">
        <a href="#" title="Close" class="modal-close">Close</a>
        <center>
          <h2>{{ contentForm }}</h2>
        </center>
        <form @submit.prevent="addProduct" >
          <div id="formAdd">
            <div class="item_input">
              <label for="input" class="Input-label">Tên sản phẩm </label>
              <input
                type="text"
                id="input"
                class="Input-text"
                placeholder="Tên sản phẩm"
                v-model="newproduct.name"
              />
            </div>
            <div class="item_input">
              <label >Hình ảnh</label><br />
                <!-- <input type="file" accept="image/*" @change="onChange"  />
                <img v-if="newproduct.img" :src="newproduct.img" v-model="newproduct.img" /> -->
              <input type="text" placeholder="Link ảnh" name="image" id="img" v-model="newproduct.img" />
            </div>
            <div class="item_input">
              <label for="type">Loại sản phẩm</label><br />
              <input
                type="text"
                name="type"
                v-model="newproduct.type"
                id="type"
                hplaceholder=" Nhập loại sản phẩm"
              />
            </div>
            <div class="item_input">
              <label for="quantity"> Số lượng</label><br />
              <input
                type="number"
                name="quantity"
                v-model="newproduct.quantity"
                id="quantity"
                min="1"
                max="10000"
                hplaceholder=" Số lượng sản phẩm"
              />
            </div>
            <div class="item_input">
              <label for="dis">Giá</label><br />
              <input
                type="number"
                name="price"
                v-model="newproduct.price"
                id="price"
                min="100000"
                max="1000000"
                hplaceholder=" Giá của sản phẩm"
              />
            </div>
            <div class="item_input">
              <label for="dis">Giảm giá</label><br />
              <input
                type="number"
                name="discount"
                v-model="newproduct.discount"
                id="discount"
                min="1"
                max="100"
                hplaceholder=" Giám giá "
              />
            </div>
            <div class="item_input">
              <label for="des"> Mô tả</label><br />
              <textarea
                name="description"
                id=""
                cols="40"
                rows="8"
                v-model="newproduct.desciption"
                hplaceholder=" Mô tả cho sản phẩm"
              ></textarea>
            </div>
          </div>
          <button type="submit">{{ buttonAdd }}</button>
        </form>
      </div>
    </div>
  </div>
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
    onChange(e) {
      const file = e.target.files[0]
      this.img= file
      this.newproduct.img = URL.createObjectURL(file)

      console.log(file);
      alert(this.newproduct.img);
    },
    getData() {
          fetch(`${process.env.MIX_GIFS_API_HOST}/api/products`)
        .then((response) => response.json())
        .then((data) => (this.products = data));
    },
    deleteProduct(id) {
      axios.delete(`${process.env.MIX_GIFS_API_HOST}/api/products/${id}`);
      this.getData();
    },

    addProduct() {
      if (this.edit == false) {
        axios.post(`${process.env.MIX_GIFS_API_HOST}/api/products`, this.newproduct);
        alert(" Insert product success");
        this.getData();
      } else {
        axios.put(`${process.env.MIX_GIFS_API_HOST}/api/products/${this.newproduct.id}`,this.newproduct);
        alert(" Update product success");
        this.getData();
      }
    },
    editProduct(product) {
      this.edit = true;
      this.buttonAdd = "Cập nhật";
      this.contentForm = "Cập nhật sản phẩm";
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
    clearData() {
      this.buttonAdd = "Thêm";
      this.contentForm = "Thêm sản phẩm mới";
      this.id = "";
      this.name = "";
      this.img = "";
      this.desciption = "";
      this.type = "";
      this.quantity = "";
      this.heart = 0;
      this.discount = "";
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
.love{
    display: flex;
    width: 100%;
        background: black;
    #yeu{
        width:20%;
        background: rebeccapurple;
    }
    #yeu5{
        width:50%;
        background: red;
    }
    #yeu4{
        width:30%;
        background: gray;
    }
}

.product{
    width: 100%;
    background: cadetblue;
}
.pro_table table {
  border-collapse: collapse;
  th,
  td {
    border: 1px solid #ccc;
  }
  td img {
    width: 150px;
    height: 150px;
  }
  th,
  td {
    text-align: left;
    padding: 10px;
  }
  tr:hover {
    background-color: #ddd;
    cursor: pointer;
  }
  th button {
    background: none;
    color: white;
  }
  tr input {
    top: 6%;
    margin-bottom: 2%;
    padding-left: 1%;
    width: 350px;
    height: 45px;
    outline: none;
    border-radius: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
}
#edit button {
  background: none;
  i {
    color: white;
  }
}

.pro_header {
  display: flex;
}
.pro_header button {
  float: right;
}
.form h2 {
  margin-bottom: 4%;
}

#edit a {
  background-color: crimson; /* Màu của Quản trị mạng ^^ */
  border: none;
  color: white;
  padding: 13px 18px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 4px;
}
#edit a:hover {
  background-color: seagreen;
}
#add {
  text-align: right;
}
#add a {
  background-color: crimson; /* Màu của Quản trị mạng ^^ */
  border: none;
  color: white;
  padding: 13px 18px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 21px;
}
#add a:hover {
  background-color: seagreen;
}
div#formAdd {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-row-gap: 30px;
}

/// FORM ADD PRODUCT
form button {
  margin-top: 5%;
  margin-left: 50%;
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
  border-radius: 4px;
}
.item_input label {
  top: 2%;
  bottom: 2%;
}
.item_input input {
  border-radius: 0.4rem;
  height: 75%;
  width: 85%;
  padding: 10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 10px 0 rgba(0, 0, 0, 0.19);
}
.item_input textarea {
  border-radius: 0.4rem;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 10px 0 rgba(0, 0, 0, 0.19);
}
.modal-window-product {
  position: fixed;
  background-color: rgba(255, 255, 255, 0.25);
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 999;
  visibility: hidden;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s;
  &:target {
    visibility: visible;
    opacity: 1;
    pointer-events: auto;
  }
  & > div {
    width: 60%;
    position: absolute;
    top: 50%;
    left: 50%;
    height: 80%;
    overflow: auto;
    border-radius: 0.4rem;
    transform: translate(-50%, -50%);
    padding: 2em;
    background-image: linear-gradient(to right, #f2709c, #ff9472);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
      0 20px 20px 0 rgba(0, 0, 0, 0.19);
  }
  header {
    font-weight: bold;
  }
  h1 {
    font-size: 150%;
    margin: 0 0 15px;
  }
}
.modal-close {
  color: #aaa;
  line-height: 50px;
  font-size: 80%;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  width: 70px;
  text-decoration: none;
  &:hover {
    color: black;
  }
}

///// PAGINATION
ul li {
  list-style: none;
}
.page-item {
  padding: 10px;
}
.pagination {
  display: flex;
  padding: 20px;
}

#navigation {
  margin-left: 30%;
  display: flex;
}
.pagination {
  margin-top: 5%;
  width: 50%;
  transform: translate(-50%, -50%);
  margin-left: 50px;
  padding: 10px;
  li {
    display: flex;
    list-style: none;
  }
  button {
    display: block;
    width: 100px;
    height: 40px;
    line-height: 40px;
    background-color: #fff;
    text-align: center;
    text-decoration: none;
    color: #252525;
    border-radius: 4px;
    font-size: 17px;
    margin: 5px;
    box-shadow: inset 0 5px 10px rgba(0, 0, 0, 0.1),
      0 2px 5px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease;
    &:hover,
    &.active {
      color: white;
      background-color: yellow;
    }
  }
  &:first-child button {
    border-radius: 30px;
  }

  &:last-child button {
    border-radius: 30px;
  }
}
</style>
