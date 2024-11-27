<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\order;
use App\Models\orderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reportController extends Controller
{
    //report page
    public function reportPage(){
        $users = User::where('role','user')->get();
        $bikes = DB::table('order_lists')
                        ->join('orders', 'order_lists.order_code', '=', 'orders.order_code')
                        ->where('orders.status', 1)
                        ->whereExists(function($query) {
                            $query->select(DB::raw(1))
                                  ->from('products')
                                  ->whereRaw('products.name = order_lists.product_name');
                        })
                        ->sum('order_lists.qty');

        //total users by month
        $usersByMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                            ->groupBy('month')
                            ->pluck('count','month');
        $monthlyUsers = array_fill(1,12,0);
        foreach($usersByMonth as $month => $count){
            $monthlyUsers[$month] = $count;
        }

        //bike sale
        $bikeSales = DB::table('order_lists')
                        ->join('orders', 'order_lists.order_code', '=', 'orders.order_code')
                        ->join('products', 'order_lists.product_name', '=', 'products.name')
                        ->where('orders.status', 1)
                        ->select('products.category_name', DB::raw('SUM(order_lists.qty) as total_sales'))
                        ->groupBy('products.category_name')
                        ->get();

        return view('admin.report.list',compact('users','bikes','monthlyUsers','bikeSales'));
    }
}
