<template>
    <div class="product">
        <div class="pro_header">
                <h1>Danh sách sản phẩm</h1>
        </div>
        <div class="pro_table">
            <table>
                <tr>
                    <th colspan='10' id="add"> <a href="#open-modal">+</a></th>
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
                <th>Xóa </th>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-danger" >
                    <i class="fas fa-edit"></i>
                    </button>
                 </td>
                <td>
                    <button class="w3-button w3-xlarge w3-teal"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <tr v-for="product in products" :key="product.id">
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
                    <i class="fas fa-edit"></i>
                    </a>
                 </td>
                <td>
                    <a>
                    <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
         </table>
        </div>
        <div id="open-modal" class="modal-window">
            <div class="form">
                 <a href="#" title="Close" class="modal-close">Close</a>
               <center> <h2> Thêm sản phẩm mới</h2></center>
               <form action="" method="post">
                   <div id="formAdd">
                    <div class="item_input">
                        <label for="input" class="Input-label">Tên sản phẩm </label>
                        <input type="text" id="input" class="Input-text" placeholder="Tên sản phẩm" v-model="newproduct.name">
                    </div>
                     <div class="item_input">
                       <label for="dis">Hình ảnh</label><br>
                       <input type="text" placeholder="Link ảnh" name="img" id="img" v-model="newproduct.img">
                   </div>
                   <div class="item_input">
                       <label for="type">Loại sản phẩm</label><br>
                       <input type="text" name="type" v-model="newproduct.type" id="type">
                   </div>
                   <div class="item_input">
                       <label for="quantity"> Số lượng</label><br>
                       <input type="number" name="quantity" v-model="newproduct.quantity" id="quantity" min="1" max="10000">
                   </div>
                   <div class="item_input">
                       <label for="dis">Giá</label><br>
                       <input type="number" name="price" v-model="newproduct.price" id="price" min="100000" max="1000000">
                   </div>
                    <div class="item_input">
                       <label for="dis">Giảm giá</label><br>
                       <input type="number" name="discount" v-model="newproduct.discount" id="discount" min="1" max="100">
                   </div>
                   <div class="item_input">
                       <label for="des"> Mô tả</label><br>
                       <textarea name="description" id="" cols="40" rows="8" v-model="newproduct.descrition"></textarea>
                   </div>
                   </div>
                   <button type="submit">Thêm</button>
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
      newproduct:{},
      edit:false
    };
  },
  created() {
   this.getData();
  },
  methods: {
    // delete(id) {
    //   axios.delete("http://localhost:7707/api/food/index/" + id);
    //   alert("Add new product success");
    //   this.getData(); http://127.0.0.1:8000/api/products
    // },
    getData(){

    //    let uri = "https://givinggift.000webhostapp.com/api/products";
    //    this.axios.get(uri).then((response) => {
    //    console.log(response);
    //   });

      this.axios.get('https://givinggift.000webhostapp.com/api/products', {
        headers: {
          "Access-Control-Allow-Origin": "*",
          "Access-Control-Allow-Methods": "GET, POST, PATCH, PUT, DELETE, OPTIONS",
          "Access-Control-Allow-Headers": "Origin, Content-Type, X-Auth-Token"
        }
      }).then(res => {
        //   this.products=res;
        console.log(res);
      }).catch(err => {
        console.log(err.response);
      });
    },
//     add(){
//       if(this.edit==false){
//        axios.post("http://localhost:7707/api/food/insert", this.newproduct);
//        this. getData();
//        alert(" Add new product success");
//       //console.log(this.food);
//       }
//       else{
//         axios.patch("http://localhost:7707/api/food/update/"+this.newproduct.id, this.newproduct);
//         alert(" Update product success");
//         this. getData();
//       }

//     },
//      edit(product){
//         this.edit = true;
//         this.newproduct.id = product.id;
//         this.newproduct.name = product.name;
//         this.newproduct.img = product.img;
//         this.newproduct.desciption = product.desciption;
//         this.newproduct.type = product.type;
//         this.newproduct.price = product.price;
//         this.newproduct.discount = product.discount;
//         this.newproduct.quantity = product.quantity;
//         this. getData();
//     },
   },
};
</script>
<style lang="scss">
        table, th, td{
            border:1px solid #ccc;
        }
        table{
            border-collapse:collapse;
            width:1200px;
        }
        th, td{
            text-align:left;
            padding:10px;
        }
        tr:hover{
            background-color:#ddd;
            cursor:pointer;
        }
        .product{
            margin-left: 1%;
            width: 100%;
        }
        .pro_header{
            display: flex;
        }
        .pro_header button{
            float: right;
        }
        .form h2{
            margin-bottom: 4%;
        }
        #edit a{
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
        #edit a:hover{
            background-color: seagreen;
        }
        #add{
            text-align: right;
        }
        #add a{
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
        #add a:hover{
            background-color: seagreen;
        }
        div#formAdd {
         display: grid;
         grid-template-columns: 1fr 1fr;
         grid-row-gap: 30px;
        }
        form button{
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
        .item_input label{
            top:2%;
            bottom: 2%;
        }
        .item_input input{
            border-radius: 0.4rem;
            height: 75%;
            width: 85%;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 10px 0 rgba(0, 0, 0, 0.19);
        }
        .item_input textarea{
            border-radius: 0.4rem;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 10px 0 rgba(0, 0, 0, 0.19);

        }
        .modal-window {
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
                width: 800px;
                position: absolute;
                top: 50%;
                left: 50%;
                height: 75%;
                border-radius: 0.4rem;
                transform: translate(-50%, -50%);
                padding: 2em;
                background-image: linear-gradient(to right,#f2709c, #ff9472);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);

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
</style>
