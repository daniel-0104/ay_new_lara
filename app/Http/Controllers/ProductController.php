<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\trend;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //product list
    public function productList(){
        $products = product::select('products.*')
                            ->when(request('key'),function($query){
                                    $query->orWhere('products.name','like','%'.request('key').'%')
                                            ->orWhere('category_name','like','%'.request('key').'%');
                                })
                            ->leftJoin('categories','products.category_name','categories.id')
                            ->leftJoin('trends','products.trend_name','trends.name')
                            ->orderBy('products.created_at','desc')->paginate(5);
        $carts = cart::get();
        return view('admin.product.list',compact('products','carts'));
    }

    //product create page
    public function createPage(){
        $products = product::select('id')->first();
        $categories = category::select('name')->get();
        $trend = trend::select('name')->get();
        return view('admin.product.create',compact('categories','trend','products'));
    }

    //product create
    public function productCreate(Request $request){
        $this->productValidationCheck($request,"create");
        $data = $this->getProductData($request);

        $customText = 'bike';
        $fileName = $customText.$request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->storeAs('public',$fileName);
        $data['image'] = $fileName;

        // dd(storage_path('app/public/' . $fileName), public_path('storage/' . $fileName));

        product::create($data);
        return redirect()->route('product#list');
    }

    //product view
    public function productView($id){
        $products = product::where('id', $id)->first();
        return view('admin.product.view', compact('products'));
    }

    //product edit page
    public function productEdit($id){
        $products = product::select('products.*')
                            ->leftJoin('categories','products.category_name','categories.id')
                            ->leftJoin('trends','products.trend_name','trends.name')
                            ->where('products.id',$id)->first();
        $trend = trend::get();
        $categories = category::get();
        return view('admin.product.edit',compact('products','categories','trend'));
    }

    //product update
    public function productUpdate(Request $request){
        $this->productValidationCheck($request,"update");
        $data = $this->getProductData($request);

        if($request->hasFile('productImage')){
            $oldImage = product::where('id',$request->productId)->first();
            $oldImage = $oldImage->image;

            $customText = 'bike';
            $fileName = $customText.$request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public',$fileName);
            $data['image'] = $fileName;

            if($oldImage != null){
                Storage::delete('public/'.$oldImage);
            }
        }

        product::where('id',$request->productId)->update($data);
        return back()->with(['updateSuccess'=>'Updated product info successfully ...']);
    }

    //product delete
    public function productDelete($id){
        $data = product::find($id);

        $image_path = public_path('storage/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $data->delete();
        return back()->with(['deleteSuccess'=>'Deleted product successfully ...']);
    }

    //get product data
    private function getProductData($request){
        return [
            'category_name' => $request->productCategory,
            'trend_name' => $request->productTrend,
            'name' => $request->productName,
            'description' => $request->productDescription,
            'price' => $request->productPrice,
        ];
    }

    //product validation check
    private function productValidationCheck($request,$action){
        $validationRules = [
            'productName' => 'required',
            // 'productId' => 'required',
            'productCategory' => 'required',
            'productTrend' => 'required',
            'productDescription' => 'required',
            'productPrice' => 'required'
        ];

        $validationRules['productImage'] = $action == "create" ? 'required|mimes:png,jpg,jpeg,avif,webp|file' : 'mimes:png,jpg,jpeg,avif,webp|file';

        Validator::make($request->all(),$validationRules)->validate();
    }
}
