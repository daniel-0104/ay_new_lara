<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //order list
    public function orderList(){
        $orders = order::select('orders.*')
                        ->leftJoin('users','orders.user_name','users.name')
                        ->orderBy('created_at','asc')
                        ->paginate(5);
        return view('admin.order.list',compact('orders'));
    }

    //order status change
    public function orderStatus(Request $request){
        order::where('id',$request->orderId)->update([
            'status' => $request->status
        ]);
    }

    //order status search
    public function orderSearch(Request $request){
        $orders = order::select('orders.*')
                        ->leftJoin('users','orders.user_name','users.name')
                        ->orderBy('created_at','asc');
        if($request->orderStatus == null){
            $orders = $orders->paginate(5);
        }
        else{
            $orders = $orders->where('orders.status',$request->orderStatus)->paginate(5);
        }
        return view('admin.order.list',compact('orders'));
    }

    //order view
    public function orderView($orderCode){
        $orders = order::where('order_code',$orderCode)->first();
        $orderLists = orderList::select('order_lists.*','products.image as bike_image','products.category_name as bike_category',
                                                        'helmets.image as helmet_image','helmets.type as helmet_category',
                                                        'jackets.image as jacket_image','jackets.type as jacket_category')
                                ->leftJoin('users','users.name','order_lists.user_name')
                                ->leftJoin('products','products.name','order_lists.product_name')
                                ->leftJoin('helmets','helmets.name','order_lists.product_name')
                                ->leftJoin('jackets','jackets.name','order_lists.product_name')
                                ->where('order_code',$orderCode)
                                ->get();
        return view('admin.order.view',compact('orders','orderLists'));
    }

    //order delete
    public function orderDelete($orderCode){
        order::where('order_code',$orderCode)->delete();
        orderList::where('order_code',$orderCode)->delete();
        return back()->with(['deleteSuccess'=>'Order List deleted successfully...']);
    }
}
