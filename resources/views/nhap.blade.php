<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <body>
    body{
    font-family: 'Roboto', sans-serif;
    padding:0;
    margin:0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

a{
    position: relative;
    padding: 15px 30px;
    color: #000;
    text-transform: uppercase;
    text-decoration: none;
    font-size: 24px;
    border: 2px solid #000;
    box-sizing: border-box;
    transition: 0.5s;
}

a:before{
    content: '';
    position: absolute;
    top: 0;
    left:0;
    width: 50%;
    height: 100%;
    background: #000;
    z-index: -1;
    transform:  scale(0);
    transition: transform 0.5s;
    transform-origin: left;
}

a:hover:before{
    transform:  scaleX(1);
    transition: transform 0.5s;
    transform-origin: right;
}

    </style>
</head>

<div>
get product

// delete(id) {
    //   axios.delete("http://localhost:7707/api/food/index/" + id);
    //   alert("Add new product success");
    //   this.getData(); http://127.0.0.1:8000/api/products
    // },
//     let uri = "https://givinggift.000webhostapp.com/api/products";
    //    this.axios.get(uri).then((response) => {
    //    this.products = response.data;
    //   });
    // },


    // //    let uri = "https://givinggift.000webhostapp.com/api/products";
    // //    this.axios.get(uri).then((response) => {
    // //    console.log(response);
    // //   });

    //   this.axios.get('https://givinggift.000webhostapp.com/api/products', {
    //     headers: {
    //       "Access-Control-Allow-Origin": "*",
    //       "Access-Control-Allow-Methods": "GET, POST, PATCH, PUT, DELETE, OPTIONS",
    //       "Access-Control-Allow-Headers": "Origin, Content-Type, X-Auth-Token"
    //     }
    //   }).then(res => {
    //     //   this.products=res;
    //     console.log(res);
    //   }).catch(err => {
    //     console.log(err.response);
    //   });
    // },
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

</div>
</body>
</html>

//// ADD product
//       $.ajax({
    //         type: "POST",
    //      url: 'https://givinggift.000webhostapp.com/api/products',
    //    }).done(function (data) {
    //      self.name = data.name;
    //      self.type = data.type;
    //      self.img = data.img;
    //      self.price = data.price;
    //      self.desciption = data.desciption;
    //      self.heart = data.heart;
    //      self.quantity = data.quantity;
    //      self.$nextTick(function () {
    //         // a and b are now updated
    //      })
    //    });
     const data = {
        name: this.name,
        type: this.type,
        img: this.img,
        price: this.price,
        desciption: this.desciption,
        heart: 0,
        quantity: this.quantity,
      };
    $.ajax({
        type: "POST",
        accepts: {
            mycustomtype: 'application/x-some-custom-type'
        },
        url: 'https://givinggift.000webhostapp.com/api/products',
        data: data,
    //     dataType: 'jsonp',
         success: function (response) {
        alert("success");
      }
    });

    // axios
    //   .post('https://givinggift.000webhostapp.com/api/products', data)
    //   .then(response => (this.info = response))
    //   // FETCH
    //   let postInJson = JSON.stringify(data);
    //   fetch(host+"api/products_store", {
    //     method: "POST",
    //     headers: {
    //       "Content-Type": "application/json, harset=utf-8",
    //       "Accept": "application/json",
    //       "Content-Length":54138
    //     },
    //     body: postInJson,
    //   }).then((response) => {
    //     return response.json();
    //   });

/// Thống kê v




// $users = order::where('created_at','=',$date)->get();
        // return $date;

        // $total_quantity = order::select(order::raw("DAYNAME(created_at) as dayname"),order::raw("(COUNT(*)) as total_quantity"))
        //  ->where('created_at', '>', Carbon::now()->startOfWeek())
        //  ->where('created_at', '<', Carbon::now()->endOfWeek())
        //  ->orderBy('created_at', 'asc')
        //  ->groupBy('dayname')
        //  ->get();
        // return $total_quantity;

      //   $previous_week = strtotime("-1 week +1 day");
      //   $start_week = strtotime("last sunday midnight",$previous_week);
      //   $end_week = strtotime("next saturday",$start_week);
      //   $start_week = date("Y-m-d",$start_week);
      //   $end_week = date("Y-m-d",$end_week);

      //  return order::whereBetween('created_at', [$start_week, $end_week])->get(['id','created_at']);
