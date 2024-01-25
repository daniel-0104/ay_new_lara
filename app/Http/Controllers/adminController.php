<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    //admin account page
    public function accountProfile(){
        return view('admin.profile.account');
    }

    //admin account edit page
    public function accountEdit(){
        return view('admin.profile.edit');
    }

    //admin account update
    public function accountUpdate($id,Request $request){
        $this->adminValidationCheck($request);
        $data = $this->getAdminData($request);

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
        return back()->with(['updateSuccess'=>'Updated your account successfully...']);
    }

    //password change page
    public function passChangePage(){
        return view('admin.profile.change');
    }

    //password change
    public function passChange($id,Request $request){
        $this->passValidationCheck($request);

        $user = User::select('password')->where('id',$id)->first();
        $hashValue =  $user->password;

        if(Hash::check($request->oldPassword, $hashValue)){
            $data = ['password' => Hash::make($request->newPassword)];
            User::where('id',$id)->update($data);
            return back()->with(['updateSuccess'=>'Updated your password successfully...']);
        }
        return back()->with(['notMatch'=>'The old password is not match. Try again!']);
    }

    //admin list page
    public function listPage(){
        $admin = User::when(request('key'),function($query){
                        $query->orWhere('name','like','%'.request('key').'%')
                                ->orWhere('email','like','%'.request('key').'%')
                                ->orWhere('gender','like','%'.request('key').'%')
                                ->orWhere('phone','like','%'.request('key').'%')
                                ->orWhere('address','like','%'.request('key').'%');
                    })
                        ->where('role','admin')->paginate(4);
        return view('admin.profile.list',compact('admin'));
    }

    // list change role
    public function changeRole(Request $request){
        $updateRole = [
            'role' => $request->role
        ];
        User::where('id',$request->adminId)->update($updateRole);
    }

    //list delete
    public function listDelete($id){
        $data = User::find($id);
        $imagePath = public_path('storage/'.$data->image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }
        $data->delete();
        return back()->with(['deleteSuccess'=>'You deleted admin account successfully...']);
    }

    //user list page
    public function userList(){
        $users = User::where('role','user')->paginate(10);
        return view('admin.user.list',compact('users'));
    }

    //user change role
    public function userChangeRole(Request $request){
        $userUpdateRole = [
            'role' => $request->role
        ];
        User::where('id',$request->userId)->update($userUpdateRole);
    }

    //user delete
    public function userDelete($id){
        $data = User::find($id);
        $imagePath = public_path('storage/'.$data->image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }
        $data->delete();
        return back()->with(['deleteSuccess'=>'Deleted user account successfully...']);
    }

    //get admin data
    private function getAdminData($request){
        return[
            'name' => $request->name,
            'email'=> $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ];
    }

    //admin validation check
    private function adminValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email'  => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp,avif|file'
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
