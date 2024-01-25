<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\trend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class trendController extends Controller
{
    //trend list
    public function trendList(){
        $trendProduct = trend::when(request('key'),function($query){
                            $query->where('name','like','%'. request('key') .'%');
                        })
                            ->orderBy('id','asc')->paginate(5);
        return view('admin.trend.list',compact('trendProduct'));
    }

    //trend create page
    public function trendCreatePage(){
        return view('admin.trend.create');
    }

    //trend create
    public function trendCreate(Request $request){
        $this->trendValidationCheck($request);
        $data = $this->getTrendData($request);

        trend::create($data);
        return redirect()->route('trend#list')->with(['createSuccess'=>'Trend Product Created Successfully.']);
    }

    //trend edit
    public function trendEdit($id){
        $trendProduct = trend::where('id',$id)->first();
        return view('admin.trend.edit',compact('trendProduct'));
    }

    //trend update
    public function trendUpdate(Request $request){
        $this->trendValidationCheck($request);
        $data = $this->getTrendData($request);
        trend::where('id',$request->trendId)->update($data);
        return redirect()->route('trend#list');
    }

    //trend delete
    public function trendDelete($id, Request $request){
        $data = $this->getTrendData($request);
        trend::where('id',$id)->delete($data);
        return back()->with(['deleteSuccess'=>'Trend Product Deleted Successfully.']);
    }

    //get trend product data
    private function getTrendData($request){
        return [
            'name' => $request->trendName,
            'updated_at' => Carbon::now()
        ];
    }

    //trend product validation
    private function trendValidationCheck($request){
        Validator::make($request->all(),[
            'trendName' => 'required|unique:trends,name,'.$request->trendId
        ])->validate();
    }
}
