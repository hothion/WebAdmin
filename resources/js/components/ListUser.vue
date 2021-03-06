<template>
      <div class="user">
        <div class="user_header">
                <h1>Danh sách người dùng</h1>
        </div>
        <div class="user_table">
            <table>
            <tr>
                <th>STT</th>
                <th>Tên tài khoản</th>
                <th> Họ và tên</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Sinh nhật</th>
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
            <tr v-for="user in users" :key="user.id">
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
            </tr>
         </table>
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
        .user{
            margin-left: 1%;
            width: 100%;
        }
        .user_header{
            display: flex;
        }
        .user_header button{
            float: right;
        }
</style>
