<?php

namespace App\Http\Controllers;

use App\Models\helmet;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HelmetController extends Controller
{
    //helmet list
    public function helmetList(){
        $helmets = helmet::when(request('key'),function($query){
                                $query->orWhere('name','like','%'. request('key') .'%')
                                      ->orWhere('color','like','%'. request('key') .'%');
                            })
                            ->orderBy('id','desc')->paginate(10);
        session(['data_displayed' => true ]);
        return view('admin.helmet.list',compact('helmets'));
    }

    //helmet create page
    public function helmetCreatePage(){
        return view('admin.helmet.create');
    }

    //helmet create
    public function helmetCreate(Request $request){
        $data = $this->getHelmetData($request);
        $this->helmetValidationCheck($request,"create");

        $customText = 'helmet';
        $fileName  = $customText.$request->file('helmetImage')->getClientOriginalName();
        $request->file('helmetImage')->storeAs('public',$fileName);
        $data['image']  = $fileName;

        helmet::create($data);
        return redirect()->route('helmet#list');
    }

    //helmet view
    public function helmetView($id){
        $helmets = helmet::where('id',$id)->first();
        return view('admin.helmet.view',compact('helmets'));
    }

    //helmet edit
    public function helmetEdit($id){
        $helmets = helmet::where('id',$id)->first();
        return view('admin.helmet.edit',compact('helmets'));
    }

    //helmet update
    public function helmetUpdate(Request $request){
        $data = $this->getHelmetData($request);
        $this->helmetValidationCheck($request,"update");

        if($request->hasFile('helmetImage')){
            $oldImage = helmet::where('id',$request->helmetId)->first();
            $oldImage = $oldImage->image;

            $customText = 'helmet';
            $fileName = $customText.$request->file('helmetImage')->getClientOriginalName();
            $request->file('helmetImage')->storeAs('public',$fileName);
            $data['image'] = $fileName;

            if($oldImage != null){
                Storage::delete('public/'.$oldImage);
            }
        }

        helmet::where('id',$request->helmetId)->update($data);
        return back()->with(['updateSuccess'=>'You updated helmet details successfully...']);
    }

    //helmet delete
    public function helmetDelete($id){
        $data = helmet::find($id);
        $imagePath = public_path('storage/'.$data->image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }
        $data->delete();
        return back()->with(['deleteSuccess'=>'You deleted helmet product successfully...']);
    }

    //get helmet data
    private function getHelmetData($request){
        return [
            'name' => $request->helmetName,
            'type' => $request->helmetType,
            'price' => $request->helmetPrice,
            'color' => $request->helmetColor,
            'description' => $request->helmetDescription,
            'material' => $request->helmetMaterial
        ];
    }

    //hlemet validation check
    private function helmetValidationCheck($request,$action){
        $validationRules = [
            'helmetName' => 'required',
            'helmetType' => 'required',
            'helmetPrice' => 'required',
            'helmetColor' => 'required',
            'helmetDescription' => 'required',
            'helmetMaterial' => 'required'
        ];
        $validationRules['helmetImage'] = $action == "create" ? 'required|mimes:png,jpg,jpeg,avif,webp|file' : 'mimes:png,jpg,jpeg,avif,webp|file';
        Validator::make($request->all(),$validationRules)->validate();
    }
}
