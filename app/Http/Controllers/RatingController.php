<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\rating;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    //user rating count
    public function ratingCount(Request $request){
        $data = $this->getRatingData($request);
        $this->ratingValidationCheck($request);
        rating::create($data);
        return back()->with(['ratingSuccess'=>'Your review was added successfully ...']);
    }

    //user rating review
    public function ratingReview(Request $request){
        $comment = rating::select('ratings.*','users.image as rating_image','users.gender as rating_gender')
                            ->leftjoin('users','users.email','ratings.user_email')
                            ->orderBy('ratings.id','desc')
                            ->paginate(6);
        if ($request->ajax()) {
            $view = view('user.product.data', compact('comment'))->render();

            return response()->json(['html' => $view, 'newReviewCount' => $comment->total()]);
        }
        return view('user.product.review',compact('comment'));
    }

    //rating review list
    public function ratingList(){
        $rating = rating::orderBy('id','asc')
                        ->paginate(5);
        return view('admin.rating.list',compact('rating'));
    }

    //user rating get data
    private function getRatingData($request){
        return [
            'user_name' => $request->ratingName,
            'user_email' => Auth::user()->email,
            'title' => $request->ratingTitle,
            'rating' => $request->input('star-input'),
            'message' => $request->ratingComment
        ];
    }

    //user rating check
    private function ratingValidationCheck($request){
        Validator::make($request->all(),[
            'ratingName' => 'required',
            'ratingEmail' => 'unique:users,email,'.$request->userId,
            'ratingTitle' => 'required',
            'star-input' => 'required|integer|between:1,5',
            'ratingComment' => 'required'
        ])->validate();
    }
}
