<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\Illuminate\Support\Facades\File;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }
    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $category = new Category();

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/upload/category/',$filename);
            $category->image = $filename;
        }
        else{
            return back()->with('status','Please Fill up the whole form');
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->save();
        return redirect('/categories')->with('status','Category Added Successfully');
    }

    //Update Category
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/upload/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/upload/category/',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->update();
        return redirect('categories')->with('status','The category is updated successfully');
        
    }


    public function delete($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'assets/upload/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status','The Category is Deleted successfully');
    }
}
