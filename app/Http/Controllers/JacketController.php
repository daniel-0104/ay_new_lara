<?php

namespace App\Http\Controllers;

use App\Models\jacket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JacketController extends Controller
{
    //jacket list
    public function jacketList(){
        $jackets = jacket::when(request('key'),function($query){
                                $query->orWhere('name','like','%'. request('key') .'%')
                                      ->orWhere('color','like','%'. request('key') .'%');
                            })
                            ->orderBy('id','desc')->paginate(10);
        session(['data_displayed'=>true]);
        return view('admin.jacket.list',compact('jackets'));
    }

    //jacket create page
    public function jacketCreatePage(){
        return view('admin.jacket.create');
    }

    //jacket create
    public function jacketCreate(Request $request){
        $data = $this->getJacketData($request);
        $this->jacketValidationCheck($request,"create");

        $customText = 'jacket';
        $fileName = $customText.$request->file('jacketImage')->getClientOriginalName();
        $request->file('jacketImage')->storeAs('public',$fileName);
        $data['image'] = $fileName;

        jacket::create($data);
        return redirect()->route('jacket#list');
    }

    //jacket view
    public function jacketView($id){
        $jackets = jacket::where('id',$id)->first();
        return view('admin.jacket.view',compact('jackets'));
    }

    //jacket edit
    public function jacketEdit($id){
        $jackets = jacket::where('id',$id)->first();
        return view('admin.jacket.edit',compact('jackets'));
    }

    //jacket update
    public function jacketUpdate(Request $request){
        $data = $this->getJacketData($request);
        $this->jacketValidationCheck($request,"update");

        if($request->hasFile('jacketImage')){
            $oldImage = jacket::where('id',$request->jacketId)->first();
            $oldImage = $oldImage->image;

            $customText = 'jacket';
            $fileName = $customText.$request->file('jacketImage')->getClientOriginalName();
            $request->file('jacketImage')->storeAs('public',$fileName);
            $data['image'] = $fileName;

            if($oldImage != null){
                Storage::delete('public/'.$oldImage);
            }
        }

        jacket::where('id',$request->jacketId)->update($data);
        return back()->with(['updateSuccess'=>'You updated jacket details successfully...']);
    }

    //jacket delete
    public function jacketDelete($id){
        $data = jacket::find($id);
        $imagePath = public_path('storage/'.$data->image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }
        $data->delete();
        return back()->with(['deleteSuccess'=>'You deleted jacket product successfully...']);
    }

    //get jacket data
    private function getJacketData($request){
        return [
            'name' => $request->jacketName,
            'price' => $request->jacketPrice,
            'color' => $request->jacketColor,
            'type' => $request->jacketType,
            'size' => $request->jacketSize,
            'description' => $request->jacketDescription
        ];
    }

    //jacket validation check
    private function jacketValidationCheck($request,$action){
        $validationRules = [
            'jacketName' => 'required',
            'jacketPrice' => 'required',
            'jacketColor' => 'required',
            'jacketType' => 'required',
            'jacketSize' => 'required',
            'jacketDescription' => 'required'
        ];
        $validationRules['jacketImage'] = $action == "create" ? 'required|mimes:png,jpg,jpeg,webp|file' : 'mimes:png,jpg,jpeg,webp|file';
        Validator::make($request->all(),$validationRules)->validate();
    }
}
