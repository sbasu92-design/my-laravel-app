<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function categorylistall()
    {
        $data['getRecord'] = Category::where('is_active', 0)->get(); 
        $data['header_title'] = "Category List";
        return view('admin.categorylist', $data);
    }

    public function addcategory()
    {
        $data['header_title'] = "Add Category";
        return view('admin.addcategory', $data);
    }

    public function isertcategory(Request $request)
    {

       
        // Validate the input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'status' => 'required|in:0,1',
            'is_active' => 'in:0,1',
            'metatitle' => 'nullable|string|max:255',
            'metadescription' => 'nullable|string',
            'metakeyword' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

       

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'status' => $request->status,
            'is_active' => 0,
            'meta_title' => $request->metatitle,
            'meta_description' => $request->metadescription,
            'meta_keyword' => $request->metakeyword,
        ]);

        
        return redirect()->route('admin.categorylist')->with('success', 'New Category added successfully!');
    }

}
