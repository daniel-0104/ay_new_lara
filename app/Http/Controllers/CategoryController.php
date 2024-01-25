<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //category list page
    public function categoryList(){
        $categories = category::when(request('key'),function($query){
                                $query->where('name','like','%'.request('key').'%');
                            })
                            ->orderBy('id','asc')->paginate(5);
        return view('admin.category.list',compact('categories'));
    }

    // create category page
    public function createPage(){
        return view('admin.category.create');
    }

    //create category
    public function categoryCreate(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->getCategoryData($request);

        category::create($data);
        return redirect()->route('admin#homePage')->with(['createSuccess'=>'Created category successfully ...']);
    }

    //edit category
    public function categoryEdit($id){
        $category = category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    // update category
    public function categoryUpdate(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->getCategoryData($request);
        category::where('id',$request->categoryId)->update($data);
        return redirect()->route('admin#homePage');
    }

    //delete category
    public function categoryDelete($id, Request $request){
        $data = $this->getCategoryData($request);
        category::where('id',$id)->delete($data);
        return back()->with(['deleteSuccess'=>'Deleted category successfully...']);
    }

    //get category data
    private function getCategoryData($request){
        return [
            'name' => $request->categoryName
        ];
    }

    //category validation check
    private function categoryValidationCheck($request){
        Validator::make($request->all(),[
            'categoryName' => 'required|unique:categories,name,'.$request->categoryId
        ])->validate();
    }
}
