<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\users;
use Carbon\Carbon;
use App\Models\order;
use App\Models\review;
use App\Models\heart;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProduct()
    {
        return product::all();
    }
    public function store(Request $request)
    {
        $product = new product();
        $product->name =$request->get('name');
        $product->type =$request->get('type');
        $product->img =$request->get('img');
        $product->price =$request->get('price');
        $product->desciption =$request->get('desciption');
        $product->discount =$request->get('discount');
        $product->heart =0;
        $product->quantity =$request->get('quantity');
        $product->save();
        return response()->json('success');
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $product = product::find($id);
        $product->name =$request->name;
        $product->type =$request->type;
        $product->img =$request->img;
        $product->price =$request->price;
        $product->desciption =$request->desciption;
        $product->discount =$request->discount;
        $product->heart =0;
        $product->quantity =$request->quantity;
        $product->save();
        return response()->json("succes");
    }

    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return response()->json($product);
    }

    public function getLineProductChart(){
        $product=product::select(product::raw('MONTH(created_at) as month'),product::raw('COUNT(id) as sum'))
        ->groupBy('month')->get();
        $productmonth=[0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($product as $product){
        for($i=1;$i<=12;$i++){
          if($i==$product["month"]){
            $productmonth[$i-1]=$product["sum"];
          }
        }
        }
        return $productmonth;
    }
    public function getBarOrderChart(){
        $order=order::select(order::raw('MONTH(created_at) as month'),order::raw('COUNT(id) as sum'))
        ->groupBy('month')->get();
        $order_month=[0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($order as $order){
        for($i=1;$i<=12;$i++){
          if($i==$order["month"]){
            $order_month[$i-1]=$order["sum"];
          }
        }
        }
        return $order_month;
    }
    public function getLineUserChart(){
        $users=users::select(users::raw('MONTH(created_at) as month'),users::raw('COUNT(id) as sum'))
        ->groupBy('month')->get();
        $userstmonth=[0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($users as $users){
        for($i=1;$i<=5;$i++){
          if($i==$users["month"]){
            $userstmonth[$i-1]=$users["sum"];
          }
        }
        }
        return $userstmonth;
    }
    public function getOrderPerDay(){
    $date = Carbon::now()->subDays(7);
    return DB::table('orders')
        ->where('orders.created_at', '>=', $date)
        ->join('product', 'orders.id_product', '=', 'product.id')
        ->groupBy(DB::raw('DATE(orders.created_at)'))
        ->select(
            DB::raw('DATE(orders.created_at) as date'),
            DB::raw('SUM(product.price) as total')
        )->get();
    }

    /// Đếm số lượng
public function getCountProduct(){
  $count_product=product::all()->count();
  return $count_product;
}
public function getCountReview(){
    $count_review=review::all()->count();
    return $count_review;
  }
  public function getCountHeart(){
    $count_heart=heart::all()->count();
    return $count_heart;
  }
  public function getCountUser(){
    $count_users=users::all()->count();
    return $count_users;
  }
  public function catePieChart(){
    $day =Carbon::now()->format('Y-m-d');
    $total_quantity = order::
    join('product', order::raw('id_product'),'=','product.id')
    ->select('product.name',order::raw('COUNT(id_product) as total_quantity'))
    ->where(order::raw('CAST(orders.created_at AS DATE)'),'=',$day)
    ->groupBy('id_product','product.name')
    ->get();
    return $total_quantity;
}
public function weekChart(){
    $getweek = order::select(order::raw("DAYNAME(created_at) as dayname"),order::raw("(COUNT(*)) as count"))
     ->where('created_at', '>', Carbon::now()->startOfWeek())
     ->where('created_at', '<', Carbon::now()->endOfWeek())
     ->orderBy('created_at', 'asc')
     ->groupBy('dayname')
     ->get();
      $order_week2=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
      $order_week=[0,0,0,0,0,0,0];
     foreach($getweek as $getweek){
        for($i=1;$i<=7 ; $i++){
            if($i == $getweek["dayname"]){
                $order_week[$i-1]=$getweek["count"];
            }
        }
     }
    return $order_week;

}
}
