<template>
    <div class="content">
        <h1>Danh sách đơn hàng</h1>
        <div class="content list">
            <button @click.prevent="orderAll">Tất cả đơn hàng</button>
            <button @click.prevent="orderConfirm"> Đơn chưa xác nhận</button>
            <button @click.prevent="orderFinished">Hoàn thành</button>
        </div>
        <div class="content table">
            <div class="content table_title">
                <p>Id</p>
                <p>Tên khách hàng </p>
                <p>Địa chỉ</p>
                <p>Ngày đặt hàng</p>
                <p>Tổng tiền</p>
                <p>Tình trạng</p>
                <p>Chi tiết </p>
                <p>Hủy đơn</p>
            </div>
            <div class="content table_content" v-for="order in orders" :key="order.id">
                <p>{{ order.id }}</p>
                <p>{{ order.users[0].firstName }} {{ order.users[0].lastName }}</p>
                <p>{{ order.users[0].address }}</p>
                <p>{{ order.created_at }}</p>
                <p>100000</p>
                <p>
                    <button type="submit" id="order_status" @click.prevent="editOrder(order.id)">
                        {{ order.order_status[0].content }}
                    </button>
                </p>
                <p><a class="btn btn-danger" href="#detailOrder">
                    <button @click.prevent=" getOrderDetail(order.id)"><i class="fas fa-eye"></i></button>
                </a>
                </p>
                <p>
                    <button><i class="fas fa-minus-circle"></i></button>
                </p>
            </div>
        </div>
    </div>
</template>
<script>
import moment from "moment";

export default {
    data() {
        return {
            orders: [],
            Orderdetails: [],
            currentYear: new Date().getFullYear(),
            orderbyStatus: 0
        };
    },
    created() {
        this.getData();
    },
    methods: {
        deleteOrder(id) {
            axios.delete(
                `${process.env.MIX_GIFS_API_HOST}api/order_delete/${id}`
            );
            alert("Delete order succes");
            this.getData();
        },
        getOrderDetail(id) {
            let uri = `${process.env.MIX_GIFS_API_HOST}api/detail_order/${id}`;
            this.axios.get(uri).then((response) => {
                this.Orderdetails = response.data;
            });
        },
        orderConfirm() {
            this.orderbyStatus = +1;
            fetch(`${process.env.MIX_GIFS_API_HOST}api/order/${this.orderbyStatus}`)
                .then((response) => response.json())
                .then((data) => (this.orders = data));
        },
        orderFinished() {
            this.orderbyStatus = +5;
            fetch(`${process.env.MIX_GIFS_API_HOST}api/order/${this.orderbyStatus}`)
                .then((response) => response.json())
                .then((data) => (this.orders = data));
        },
        orderAll() {
            fetch(`${process.env.MIX_GIFS_API_HOST}api/order`)
                .then((response) => response.json())
                .then((data) => (this.orders = data));
        },
        getData() {
            if (this.orderbyStatus == 0) {
                fetch(`${process.env.MIX_GIFS_API_HOST}api/order`)
                    .then((response) => response.json())
                    .then((data) => (this.orders = data));
            }
            // this.date_order = moment("13:30 9 11 2021").format('YYYY-MM-DD');
        },
        editOrder(id) {
            axios.patch(
                `${process.env.MIX_GIFS_API_HOST}api/order_update/${id}`
            );
            this.getData();
        },
    },
};
</script>
<style lang="scss">
.content .table_content,
.content .table_title {
    width: 100%;
    display: grid;
    grid-template-columns: 0.5fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
    grid-column-gap: 10px;
    grid-row-gap: 20px;
    border-radius: 10px;
}

.content {
    width: 95%;
    margin-left: 2%;
}

.content .table {
    width: 100%;
}

.content h1 {
    margin-bottom: 10px;
    color: black;
    font-size: 2rem;
    font-size: 1.5rem;
    font-family: Helvetica, Arial, sans-serif;
}

.content .list {
    display: flex;
    margin-bottom: 10px;
}

.content .list button {
    padding: 10px;
    background: none;
    border-bottom: 2px solid red;
    border-right: 2px solid red;
    border-radius: 10px;
    font-size: 1rem;
}

.content .table_title {
    margin-left: 0;
    text-align: center;
    background: #009688;
    color: white;
    font-size: 1.2rem;
    padding: 10px 0;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.35);
}

.content .table_content {
    margin-top: 10px;
    font-size: 1.1rem;
    background: white;
    margin-left: 0;
    text-align: center;
    box-shadow: 0px 7px 29px 0px rgba(100, 100, 111, 0.2);
}

.content .table_content p {
    padding: 17px 15px;
}

.content .table_content button {
    padding: 8px;
    background: red;
    color: white;
    border: 0;
    border-radius: 10px;
}
</style>
