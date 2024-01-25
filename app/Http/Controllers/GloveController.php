<?php

namespace App\Http\Controllers;

use App\Models\glove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GloveController extends Controller
{
    //glove list
    public function gloveList(){
        $gloves = glove::when(request('key'),function($query){
                            $query->orWhere('name','like','%'. request('key') .'%')
                                  ->orWhere('color','like','%'. request('key') .'%');
                        })
                        ->orderBy('id','desc')
                        ->paginate(10);
        session(['data-displayed'=>true]);
        return view('admin.glove.list',compact('gloves'));
    }

    //glove create page
    public function gloveCreatePage(){
        return view('admin.glove.create');
    }

    //glove create
    public function gloveCreate(Request $request){
        $data = $this->getGloveData($request);
        $this->gloveValidationCheck($request,'create');

        $customText = 'glove';
        $fileName = $customText.$request->file('gloveImage')->getClientOriginalName();
        $request->file('gloveImage')->storeAs('public',$fileName);
        $data['image'] = $fileName;

        glove::create($data);
       return redirect()->route('glove#list');
    }

    //glove view
    public function gloveView($id){
        $gloves = glove::where('id',$id)->first();
        return view('admin.glove.view',compact('gloves'));
    }

    //glove edit page
    public function gloveEdit($id){
        $gloves = glove::where('id',$id)->first();
        return view('admin.glove.edit',compact('gloves'));
    }

    //glove update
    public function gloveUpdate(Request $request){
        $data = $this->getGloveData($request);
        $this->gloveValidationCheck($request,'update');

        if ($request->hasFile('gloveImage')){
            $oldImage  = glove::where('id',$request->gloveId)->first();
            $oldImage = $oldImage->image;

            $customText = 'glove';
            $fileName = $customText.$request->file('gloveImage')->getClientOriginalName();
            $request->file('gloveImage')->storeAs('public',$fileName);
            $data['image'] = $fileName;

            if($oldImage != null){
                Storage::delete('public/'.$oldImage);
            }
        }

        glove::where('id',$request->gloveId)->update($data);
        return back()->with(['updateSuccess'=>'Glove product was updated successfully...']);
    }

    //glove delete
    public function gloveDelete($id){
        $data = glove::where('id',$id)->first();
        $imagePath = public_path('storage/'.$data->image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }
        $data->delete();
        return back()->with(['deleteSuccess'=>'You deleted Glove product successfully...']);
    }

    //get glove data
    private function getGloveData($request){
        return [
            'name' => $request->gloveName,
            'price' => $request->glovePrice,
            'color' => $request->gloveColor,
            'type' => $request->gloveType,
            'size' => $request->gloveSize,
            'description' => $request->gloveDescription
        ];
    }

    //glove validation check
    private function gloveValidationCheck($request,$action){
        $validationRules = [
            'gloveName' => 'required',
            'glovePrice' => 'required',
            'gloveColor' => 'required',
            'gloveType' => 'required',
            'gloveSize' => 'required',
            'gloveDescription' => 'required'
        ];
        $validationRules['gloveImage'] = $action == 'create' ? 'required|mimes:jpg,jpeg,webp,avif|file' : 'mimes:jpg,jpeg,webp,avif|file';
        Validator::make($request->all(),$validationRules)->validate();
    }
}
