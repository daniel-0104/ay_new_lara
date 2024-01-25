<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //contact page
    public function contactPage(){
        $carts = cart::get();
        $orders = order::where('user_name',Auth::user()->name)->paginate(5);
        return view('user.contact.contact',compact('carts','orders'));
    }

    //contact message
    public function contactMessage(Request $request){
        $data = $this->getContactData($request);
        $this->contactValidationCheck($request);

        contact::create($data);
        return back()->with(['sendSuccess'=>'Your message was sent successfully...']);
    }

    //contact message list
    public function contactList(){
        $contacts = contact::paginate(5);
        return view('admin.contact.list',compact('contacts'));
    }

    //contact message delete
    public function contactDelete($id){
        contact::where('id',$id)->delete();
        return back()->with(['messageDelete'=>'Deleted message successfully...']);
    }

    //get contact data
    private function getContactData($request){
        return[
            'name' => $request->contactName,
            'email' => $request->contactEmail,
            'message' => $request->contactMessage
        ];
    }

    //contact validation check
    private function contactValidationCheck($request){
        Validator::make($request->all(),[
            'contactName' => 'required',
            'contactEmail' => 'required|unique:users,email,'.$request->userId,
            'contactMessage' => 'required'
        ])->validate();
    }
}
