<template>
      <div class="order">
        <div class="order_header">
                <h1>Danh sách đơn hàng</h1>
        </div>
        <div class="order_table">
            <table>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th> Ngày</th>
                <th>Tình trạng đơn hàng</th>
                <th>Tình trạng thanh toán</th>
                <th>Tình trạng giao hàng</th>
                <th> Tên cửa hàng</th>
                <th>Tổng đơn hàng</th>
                <th> Xem chi tiết </th>
            </tr>
             <tr >
                <td>HG233</td>
                <td>Ho Thi Yeu</td>
                <td>27-2-2021</td>
                <td><button type="submit" id="order_status">Xác nhận đơn</button></td>
                <td><button type="submit" id="pay">Chưa trả tiền</button></td>
                <td><button type="submit" id="shipping">Chưa giao hàng</button></td>
                <td> Lão Đại</td>
                <td>200000000 đ</td>
                <td>
                    <a href="#open-modal"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            <!-- <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.firstName }} {{ user.lastName }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.gender }}</td>
                <td>{{ user.phone }}</td>
                <td>{{ user.address }}</td>
                <td>{{ user.birthday }}</td>
                <td>
                    <a class="btn btn-danger" >
                    <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr> -->
         </table>
        </div>
          <div id="open-modal" class="modal-window">
            <div class="form">
                 <a href="#" title="Close" class="modal-close">Close</a>
               <center> <h2> Sản phẩm</h2></center>
              <div>
                  <h4>hello</h4>
              </div>
            </div>
        </div>
      </div>
</template>
<script>
export default {
  data() {
    return {
      users: []
    };
  },
  created() {
   this.getData();
  },
  methods: {
    // delete(id) {
    //   axios.delete("http://localhost:7707/api/food/index/" + id);
    //   alert("Add new product success");
    //   this.getData();
    // },
    getData(){
       let uri = "https://givinggift.000webhostapp.com/api/account";
       this.axios.get(uri).then((response) => {
        this.users = response;
       console.log(response);
      });
   },
  }
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
        .order{
            margin-left: 1%;
            width: 100%;
        }
        .order_header{
            display: flex;
        }
        .order_header button{
            float: right;
        }
        td a{
            background-color: rgb(236, 63, 10); /* Màu của Quản trị mạng ^^ */
            border: none;
            color: white;
            padding: 10px 10px;
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
        td #order_status{
            background-color: crimson; /* Màu của Quản trị mạng ^^ */
            border: none;
            color: white;
            padding: 13px 10px;
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
        td #pay{
            background-color: rgb(107, 73, 199); /* Màu của Quản trị mạng ^^ */
            border: none;
            color: white;
            padding: 13px 10px;
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
        td #shipping{
            background-color: rgb(29, 223, 132); /* Màu của Quản trị mạng ^^ */
            border: none;
            color: white;
            padding: 13px 10px;
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
                background-image: linear-gradient(to right,#ddd4d7, #ebddd9);
                box-shadow: 0 4px 8px 0 rgba(211, 202, 202, 0.2), 0 20px 20px 0 rgba(0, 0, 0, 0.19);

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
