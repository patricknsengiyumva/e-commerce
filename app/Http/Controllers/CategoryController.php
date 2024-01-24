<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        return view("admin.categories.index", compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            "title" => "required|min:3",
            "slug" => "required|min:3",
        ]);
    
        // Check if category with the same title or slug already exists
        $existingCategory = Category::where('title', $request->title)
                                     ->orWhere('slug', $request->slug)
                                     ->first();
    
        if ($existingCategory) {
            return redirect()->route("admin.get-categories")
                             ->withErrors(['category_exists' => 'Category with the same title or slug already exists'])
                             ->withInput();
        }
    
        // Create the category if it doesn't exist
        Category::create([
            "title" => $request->title,
            "slug" => $request->slug,
        ]);
    
        return redirect()->route("admin.get-categories")
                         ->withSuccess("Category added");
    }
    
  

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
