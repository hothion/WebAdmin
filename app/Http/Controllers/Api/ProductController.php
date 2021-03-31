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
    //    $image = $request->file("img")->store("public");

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
 ///  Statistics
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
        return $order;
    }
    public function getLineUserChart(){
        $users=users::select(users::raw('MONTH(created_at) as month'),users::raw('COUNT(id) as sum'))
        ->groupBy('month')->get();
        $userstmonth=[0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($users as $users){
        for($i=1;$i<=12;$i++){
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
        $total_quantity = order::select(order::raw("DATE(created_at) as date"),order::raw("(COUNT(*)) as total_quantity"))
         ->groupBy('date')
         ->get();
        //   $order_week2=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        // //   for($i=0;$i< count($order_week2) ; $i++){
        // //    echo $order_week2[$i];
        // // }

        //  foreach($total_quantity as $total_quantity){
        //     foreach($order_week2 as $total_quantity){
        //     for($i=0; $i < count($order_week2) ; $i++){
        //         if($order_week2[$i] == $total_quantity["dayname"]){
        //             $order_week2[$i] = $total_quantity["total_quantity"];
        //         }
        //     }
        //  }
        // ->where('created_at', '>', Carbon::now()->startOfWeek())
        // ->where('created_at', '<', Carbon::now()->endOfWeek())
        // ->orderBy('created_at', 'asc')

        return $total_quantity;

    }
    public function LastweekChart(){
        $date = Carbon::now()->endOfWeek();

        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $date = Carbon::createFromDate($year,$month);
        $numberOfWeeks = floor($date->daysInMonth / Carbon::DAYS_PER_WEEK);
        $start = [];
        $end = [];
        $j=1;
        for ($i=1; $i <= $date->daysInMonth ; $i++) {
            Carbon::createFromDate($year,$month,$i);
            $start[$j]= (array)Carbon::createFromDate($year,$month,$i)->startOfWeek()->toDateString();
            $end[$j]= (array)Carbon::createFromDate($year,$month,$i)->endOfweek()->toDateString();
            $i+=7;
            $j++;
        }
        $result = array_merge($start,$end);
        $result['numberOfWeeks'] = ["$numberOfWeeks"];


        // echo $tuan;
        $or = order::select(order::raw("created_at as dayname"),order::raw("(COUNT(*)) as total_quantity"))
             ->where(order::raw('created_at'),'=',$start)
             ->groupBy('dayname')
             ->get();
        return $or;

    }

function getDayofYear($counter){
    // Ngày hiện tại
    $noww = Carbon::now();
    $currentDay = $noww->format('d-m-Y');

    //  $date = Carbon::now()->endOfWeek();

    // Ngày đâu và Cuối tuần
    $startdayWeek = $noww->startOfWeek();
    $firstDayWeek = $startdayWeek->format('d-m-Y');

    $enddayWeek = $noww->endOfWeek();
    $End_Week = $enddayWeek->format('d-m-Y');

    /// Ngày đầu năm
    $dayYear = $noww->firstOfYear();
    $firstDayYear = $dayYear->format('d-m-Y');

    ///
     $diffweek = strtotime($End_Week) - strtotime($currentDay);
     $numberDiffWeek = ceil(abs($diffweek / 86400));

    // Tính số ngày hiện tại của 1 năm
    $diff = strtotime($firstDayYear) - strtotime($currentDay);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    $numberDay = ceil(abs($diff / 86400)) +1;
    ///  7 ngày trong tuần
    $EndDay = $numberDay + $numberDiffWeek - 7*$counter;
    $startDay = $EndDay - 6;
    /// chuyển sàng ngày tháng

    // for($i = $startDay; $i <= $EndDay; $i++){
    //     return $i;
    // }
    return $startDay;
}

function getNumberWeek(){
    // Tuần hiện tại
    $noww = Carbon::now();
     $tuan = $noww->weekOfYear;
     return $tuan;
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

}
