<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\cart;
use App\Models\User;
use App\Models\glove;
use App\Models\order;
use App\Models\trend;
use App\Models\helmet;
use App\Models\jacket;
use App\Models\rating;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //user website home page
    public function userHomePage(){
        $products = product::get();
        $trends = trend::get();
        $carts = cart::get();
        $helmets = helmet::orderBy('id','desc')->get();
        $jackets = jacket::orderBy('id','desc')->get();
        $gloves = glove::orderBy('id','desc')->get();
        $orders = order::get();
        return view('user.website.home',compact('products','trends','carts','helmets','jackets','gloves','orders'));
    }

    //user product
    public function userProduct($trendName){
        $products = product::where('trend_name',$trendName)->get();
        $trends = trend::get();
        $carts = cart::get();
        $orders = order::get();
        $helmets = helmet::orderBy('id','desc')->get();
        $jackets = jacket::orderBy('id','desc')->get();
        $gloves = glove::orderBy('id','desc')->get();
        return view('user.website.home',compact('products','trends','carts','orders','helmets','jackets','gloves'));
    }

    //user account page
    public function userAcc(){
        return view('user.website.account');
    }

    //user account pfp update
    public function userpfpUpdate($id,Request $request){
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        //for image
        if($request->hasFile('image')){
            $dbImage = User::where('id',$id)->first();
            $dbImage = $dbImage->image;

            $customText = 'profile';
            $fileName = $customText . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;

            if($dbImage != null){
                Storage::delete('public/'.$dbImage);
            }
        }

        User::where('id',$id)->update($data);
        return back()->with(['updateSuccess' => 'Your account was updated successfully.']);
    }

    // user account password change page
    public function changePassPage(){
        return view('user.website.changePass');
    }

    //password change
    public function changePass(Request $request){
        $this->passValidationCheck($request);

        $currentUserId = Auth::user()->id;
        $user = User::select('password')->where('id',$currentUserId)->first();
        $dbHashValue = $user->password;

        if(Hash::check($request->oldPassword, $dbHashValue)){
            $data = ['password'=>Hash::make($request->newPassword)];
            User::where('id',$currentUserId)->update($data);
            return back()->with(['changeSuccess'=>'You updated your password successfully']);
        }
        return back()->with(['notMatch'=>'The oldPassword is not match. Try again!']);
    }

    //about us page
    public function aboutPage(){
        $carts = cart::get();
        $orders = order::get();
        return view('user.aboutUs.about',compact('carts','orders'));
    }

    //product list page
    public function productList(){
        $products = product::orderBy('id','asc')->get();
        $category = category::get();
        $carts = cart::get();
        $orders = order::get();

        $response = product::get();
        // $url = route('detail#view', ['id' => $response[0]->id]);
        return view('user.product.list',compact('products','category','carts','response','orders'));
    }

    //product fliter
    public function productFliter($categoryId){
        $products = product::where('category_name',$categoryId)->orderBy('id','asc')->get();
        $category = category::get();
        $carts = cart::get();
        $orders = order::get();

        $response = product::get();
        return view('user.product.list',compact('products','category','carts','response','orders'));
    }

    //product history
    public function productHistory(){
        $carts = cart::get();
        $orders = order::where('user_name',Auth::user()->name)->paginate(5);
        return view('user.cart.history',compact('carts','orders'));
    }

    //cart list
    public function cartList(){
        $cartList = cart::select('carts.*','products.name as bike_name','products.image as bike_image','products.price as bike_price',
                                            'helmets.name as helmet_name','helmets.image as helmet_image','helmets.price as helmet_price',
                                            'jackets.name as jacket_name','jackets.image as jacket_image','jackets.price as jacket_price',
                                            'gloves.name as glove_name','gloves.image as glove_image','gloves.price as glove_price')
                            ->leftJoin('products','products.name','carts.product_name')
                            ->leftJoin('helmets','helmets.name','carts.product_name')
                            ->leftJoin('jackets','jackets.name','carts.product_name')
                            ->leftJoin('gloves','gloves.name','carts.product_name')
                            ->where('carts.user_id',Auth::user()->id)
                            ->get();
        $totalPrice = 0;
        foreach($cartList as $c){
            $totalPrice += $c->bike_price*$c->qty;
        }
        $orders = order::get();
        return view('user.cart.list',compact('cartList','totalPrice','orders'));
    }

    //deatail view
    public function detailView($id,Request $request){
        $products = product::where('id',$id)->first();
        $productList = product::get();

        // Get the viewed products from the session or initialize an empty array
        $viewProduct = session()->get('viewProduct', []);

        // Initialize an empty array if it's not already an array
        if (!is_array($viewProduct)) {
            $viewProduct = [];
        }

        // Check if the post ID exists in the viewProduct array
        if (!in_array($products->id, $viewProduct)) {
            // Increment the view count only if the product hasn't been viewed in this session
            $products->increment('view_count');

            // Add the post ID to the list of vieweProduct in the current session
            $viewProduct[] = $products->id;

            // Update the session data with the new viewProduct array
            session(['viewProduct' => $viewProduct]);
        }

        $carts = cart::get();
        $response = product::get();
        $orders = order::get();

        // rating comment
        $comment = rating::select('ratings.*','users.image as rating_image','users.gender as rating_gender')
                            ->leftjoin('users','users.email','ratings.user_email')
                            ->orderBy('ratings.id','desc')
                            ->paginate(3);
        if ($request->ajax()) {
            $view = view('user.product.data', compact('products','carts','comment'))->render();

            return response()->json(['html' => $view, 'newReviewCount' => $comment->total()]);
        }

        return view('user.product.view',compact('products','productList','carts','response','comment','orders'));
    }

    //accessories list start
        //helmet
        public function helmetView($id,Request $request){
            $helmets = helmet::where('id',$id)->first();
            $carts = cart::get();
            $helmetList = helmet::get();
            $orders = order::get();

            $veiwHelmets = session()->get('viewHelmet',[]);
            if(!is_array($veiwHelmets)){
                $veiwHelmets = [];
            }
            if(!in_array($helmets->id, $veiwHelmets)){
                $helmets->increment('view_count');
                $veiwHelmets[] = $helmets->id;
                session(['viewHelmet'=>$veiwHelmets]);
            }

            $comment = rating::select('ratings.*','users.image as rating_image','users.gender as rating_gender')
                                ->leftjoin('users','users.email','ratings.user_email')
                                ->orderBy('ratings.id','desc')
                                ->paginate(3);
            if ($request->ajax()) {
                $view = view('user.product.data', compact('helmets','carts','comment'))->render();
                return response()->json(['html' => $view, 'newReviewCount' => $comment->total()]);
            }

            return view('user.helmet.view',compact('helmets','comment','carts','helmetList','orders'));
        }

        //jacket
        public function jacketView($id,Request $request){
            $jackets = jacket::where('id',$id)->first();
            $carts = cart::get();
            $jacketLists = jacket::get();
            $orders = order::get();

            $viewJacket = session()->get('viewJacket',[]);
            if(!is_array($viewJacket)){
                $viewJacket = [];
            }
            if(!in_array($jackets->id,$viewJacket)){
                $jackets->increment('view_count');
                $viewJacket[] = $jackets->id;
                session(['viewJacket'=>$viewJacket]);
            }

            $comment = rating::select('ratings.*','users.image as rating_image','users.gender as rating_gender')
                                ->leftjoin('users','users.email','ratings.user_email')
                                ->orderBy('ratings.id','desc')
                                ->paginate(3);
            if ($request->ajax()) {
                $view = view('user.product.data', compact('jackets','carts','comment'))->render();
                return response()->json(['html' => $view, 'newReviewCount' => $comment->total()]);
            }

            return view('user.jacket.view',compact('jackets','carts','comment','jacketLists','orders'));
        }

        //glove
        public function gloveView($id,Request $request){
            $gloves = glove::where('id',$id)->first();
            $carts = cart::get();
            $orders = order::get();
            $gloveList = glove::get();

            $viewGlove = session()->get('viewGlove',[]);
            if(!is_array($viewGlove)){
                $viewGlove = [];
            }
            if(!in_array($gloves->id,$viewGlove)){
                $gloves->increment('view_count');
                $viewGlove[] = $gloves->id;
                session(['viewGlove'=>$viewGlove]);
            }

            $comment = rating::select('ratings.*','users.image as rating_image','users.gender as rating_gender')
                                ->leftjoin('users','users.email','ratings.user_email')
                                ->orderBy('ratings.id','desc')
                                ->paginate(3);
            if ($request->ajax()) {
                $view = view('user.product.data', compact('gloves','carts','comment'))->render();
                return response()->json(['html' => $view, 'newReviewCount' => $comment->total()]);
            }

            return view('user.glove.view',compact('gloves','carts','orders','gloveList','comment'));
        }
    //accessories list end

    //request user data
    private function getUserData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }

    //account validation check
    private function accountValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required' ,
            'email' => 'required' ,
            'phone' => 'required' ,
            'gender' => 'required' ,
            'image' => 'mimes:png,jpg,jpeg,webp,avif|file' ,
            'address' => 'required' ,
        ])->validate();
    }

    //password validation check
    private function passValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword' => 'required|min:6|max:10',
            'newPassword' => 'required|min:6|max:10',
            'confirmPassword' => 'required|min:6|max:10|same:newPassword'
        ])->validate();
    }
}
