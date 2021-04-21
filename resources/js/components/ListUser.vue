<template>
  <div class="user">
    <div class="user_header">
      <h1>Danh sách người dùng</h1>
      <input class="form-control" type="text" v-model="search" placeholder=" Nhập tên tài khoản ....." />
    </div>
    <div class="user_table">
      <table>
        <tr>
          <th>STT</th>
          <th>Tên tài khoản</th>
          <th>Họ và tên</th>
          <th>Email</th>
          <th>Giới tính</th>
          <th>Số điện thoại</th>
          <th>Địa chỉ</th>
          <th>Sinh nhật</th>
          <th>Xóa</th>git
        </tr>
        <tr v-for="user in resultQuery" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.account }}</td>
          <td>{{ user.firstName }} {{ user.lastName }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.gender }}</td>
          <td>{{ user.phone }}</td>
          <td>{{ user.address }}</td>
          <td>{{ user.birthday }}</td>
          <td>
            <a @click.prevent="deleteAccount(user.id)">
              <i class="fas fa-trash-alt"></i>
            </a>
          </td>
        </tr>
      </table>
    <div id="navigation">
        <ul class="pagination">
          <li class="page-item">
            <button type="button" class="page-link" v-if="page != 1" @click="page--">
              Previous
            </button>
          </li>
          <li class="page-item">
            <button type="button" class="page-link" v-for="pageNumber in Userpages.slice(page - 1, page + 5)" @click="page = pageNumber">
              {{ pageNumber }}
            </button>
          </li>
          <li class="page-item">
            <button type="button" @click="page++" v-if="page < Userpages.length" class="page-link">
              Next
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      users: [],
      pageSize: 5,
      currentPage: 1,
      page: 1,
      perPage: 7,
      Userpages: [],
      search: null
    };
  },
  created() {
      this.getData();
  },
  methods: {
    getData() {
      fetch(`${process.env.MIX_GIFS_API_HOST}/api/account`)
        .then((response) => response.json())
        .then((data) => (this.users = data),

        );
    },
    deleteAccount(id) {
       axios.delete(`${process.env.MIX_GIFS_API_HOST}/api/account/${id}`);
       alert('Delete');
       this.getData();
     },
    setPages() {
      let numberOfPages = Math.ceil(this.users.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.Userpages.push(index);
      }
    },
    paginate(users) {
      let page = this.page;
      let perPage = this.perPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return users.slice(from, to);
    },

  },
  computed: {
    displayedPosts() {
      return this.paginate(this.users);
    },
    resultQuery(){
      if(this.search){
      return this.users.filter((item)=>{
        return this.search.toLowerCase().split(' ').every(v => item.account.toLowerCase().includes(v))
      })
      }else{
        return this.paginate(this.users);
      }
    }
  },
  watch: {
    users() {
      this.setPages();
    },
  },
  created() {
    this.getData();
  },
  filters: {
    trimWords(value) {
      return value.split(" ").splice(0, 20).join(" ") + "...";
    },
  },
};
</script>
<style lang="scss">
table,
th,
td {
  border: 1px solid #ccc;
}
table {
  border-collapse: collapse;
  width: 1200px;
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
.user {
  margin-left: 1%;
  width: 100%;
}
.user_header input{
  top: 6%;
  margin-bottom: 3%;
  padding-left: 1%;
  width: 300px;
  height: 45px;
  border-radius: 20px;
  outline: none;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.user_header button {
  float: right;
}
// PAGINATION
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
.pagination{
    margin-top: 5%;
    width: 50%;
	transform: translate(-50%,-50%);
    margin-left: 50px;
	padding: 10px;
	li{
        display: flex;
		list-style: none;
    }
		button{
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
			box-shadow: inset 0 5px 10px rgba(0,0,0,.1), 0 2px 5px rgba(0,0,0,.5);
			transition: all .3s ease;
			&:hover,&.active{
                color: white;
				background-color: yellow;
            }

        }
		&:first-child
			button{
                border-radius: 30px;
            }

		&:last-child
			button{
                border-radius: 30px
            }

}
</style>
