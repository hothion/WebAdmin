<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\order;
use App\Models\users;
use App\Models\product;
use App\Models\order_status;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getOrder()
    {
        $order = order::all();
        $user = users::all();
        $product = product::all();
        $order_status = order_status::all();
        foreach($order as $od){
            $od->users;
            $od->product;
            $od->order_status;
        }
        return $order;
    }


    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $orders = order::find($id);
        return $orders;
    }
    public function getAddProduct(Request $request)
    {
        $pro=DB::select('select id , quantity from orders where id_product ='.$request->get('id_pro').' and id_user='.$request->get('id_user'));
        if($pro==null){
            $order=new order();
            $order->id_product=$request->get('id_pro');
            $order->id_user=$request->get('id_user');
            $order->quantity=1;
            $order->save();
            echo "add new product sussess";
        }else{
            order::where("id", $pro[0]->id)->update([
              "quantity" =>$pro[0]->quantity+1
          ]);
          echo "increase quantity of product";
        }
    }

    public function getOrderDetails($id)
    {
        echo $id;
        $order = DB::select('select o.quantity as quantityCart, p.* from product as p , orders as o where p.id =o.id_product and o.id_user ='.$id);
        return $order;
    }
    public function getOrderDetailsAdmin($id)
    {
        $order = order::find($id);
        return $order;
    }

    public function update(Request $request, $id)
    {
        $orders = order::find($id);
            $orders->order_status;
            if($orders->order_status[0]->id < 5){
                $orders->id_orderStatus = $orders->id_orderStatus + 1;
                $orders->save();
            }
        return $orders;


    }
    public function destroy($id)
    {
        $oders = order::find($id);
        $oders->delete();
        return response()->json($oders);
    }

    public function deleteProductInOrder(Request $request){
        $pro=DB::select('select id , quantity from orders where id_product ='.$request->get('id_pro').' and id_user='.$request->get('id_user'));
        if($pro[0]->quantity > 1){
            order::where("id", $pro[0]->id)->update([
                "quantity" =>$pro[0]->quantity-1
            ]);
            echo "decrease quantity of product";
        }else{
            DB::delete('delete from orders where id ='.$pro[0]->id);
            echo "delete product";
        }
    }
}
