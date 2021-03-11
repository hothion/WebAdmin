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
