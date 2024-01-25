<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\trend;
use App\Models\product;
use App\Models\category;
use App\Models\orderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ajaxController extends Controller
{
    //product sorting
    public function ajaxSorting(Request $request){
        if ($request->status == 'asc') {
            $data = product::orderBy('id','asc')->get();
        } else {
            $data = product::orderBy('id','desc')->get();
        }
        return $data;
    }

    //category of product sorting
    public function getProductsByCategory(Request $request)
    {
        $category = $request->input('category');

        if ($request->status == 'asc') {
            $filteredProducts = product::where('category_name', $category)
                                        ->orderBy('id','asc')
                                        ->get();
        } else {
            $filteredProducts = product::where('category_name', $category)
                                        ->orderBy('id','desc')
                                        ->get();
        }

        return response()->json($filteredProducts);
    }

    //add to cart
    public function addToCart(Request $request){
        $data = $this->getOrderData($request);
        cart::create($data);
        $response = [
            'message' => 'Add To Cart Complete',
            'status' => 'Success'
        ];
        return response()->json($response, 200);
    }

    //cart clear
    public function cartClear(){
        cart::where('user_id',Auth::user()->id)->delete();
    }

    //cart remove btn
    public function cartRemove(Request $request){
        cart::where('user_id',Auth::user()->id)
            ->where('product_name',$request->productName)
            ->where('id',$request->orderId)
            ->delete();
    }

    //cart order btn
    public function cartOrder(Request $request){
        $total = 0;
        foreach($request->all() as $item){
            $data = orderList::create([
                'user_name' => Auth::user()->name,
                'product_name' => $item['product_name'],
                'qty' => $item['qty'],
                'total' => $item['total'],
                'order_code' => $item['order_code']
            ]);
            $total += $data->total;
        }

        cart::where('user_id',Auth::user()->id)->delete();
        $order = order::create([
            'user_name' => Auth::user()->name,
            'order_code' => $data->order_code,
            'total_price' => $total+15000
        ]);

        return response()->json([
            'status' => 'true',
            'message' => 'order completed'
        ],200);
    }

    //get order data
    private function getOrderData($request){
        return [
            'user_id' => $request->userId,
            'product_name' => $request->productName,
            'qty' => $request->count
        ];
    }
}
