<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }
        //SEO
        //$this->setSeo(__('app.category'), 'Categories Page Latest Categories With Images And Description');

        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validate save category
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'pics' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();

        // Upload img
        if($request->hasFile('pics')){
            // Filename with extension
            $filename = $request->file('pics')->getClientOriginalName();
            // Path to save file in images folder
            $request->file('pics')->storeAs('public/categories', $filename);
        } else {
            $filename = 'default.svg';
        }

        $category->name = htmlspecialchars($request->name);
        $category->desc = htmlspecialchars($request->desc);
        $category->pics = $filename;

        $category->save();


        return redirect(route('category.index'))->withToastSuccess('Category Created Successfully!');
    }

    public function show(Category $category)
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }
        //SEO
        //$this->setSeo( $category->name, $category->desc);

        return view('categories.show', compact('category'));
    }

    public function edit()
    {
        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        //validate update category
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'pics' => 'sometimes|image|mimes:jpeg,png,jpg,svg|max:1024',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Upload img
        if($request->hasFile('pics')){
            // Filename with extension
            $filename = $request->file('pics')->getClientOriginalName();
            // Path to save file in images folder
            $request->file('pics')->storeAs('public/categories', $filename);
        }

        $category->name = htmlspecialchars($request->name);
        $category->desc = htmlspecialchars($request->desc);
        if($request->hasFile('pics')){
            // Delete Old Image
            Storage::delete('public/categories/'.$category->pics);
            $category->pics = $filename;
        }

        $category->update();


        return redirect(route('category.index'))->withToastSuccess('Category Updated Successfully!');
    }

    public function destroy(Category $category)
    {
        //delete category
        $category->delete();
        //Delete Image
        Storage::delete('/public/categories/'.$category->pics);

        return redirect(route('category.index'))->withToastSuccess('Category Deleted Successfully!');
    }
}
