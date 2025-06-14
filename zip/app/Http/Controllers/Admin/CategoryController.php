<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::where('is_delete', 0)->get();

        return view('admin.category.list', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('Create category');
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect(route('admin.category.list'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Category',
                'message' => 'Category registration successfully',
            ],
        ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::where('id', base64_decode($id))
        // ->with(['category'])
        ->first();

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $category = Category::findOrFail($request->id);

        // $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect(route('admin.category.list'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Category',
                'message' => 'Category Updated successfully',
            ],
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // dd(base64_decode($id));
    // Find the category by ID
    $category = Category::findOrFail(base64_decode($id));

    // Update is_delete to 1
    $category->is_delete = 1;

    // Save the changes
    $category->save();

    // Redirect with a success message
    return redirect()->route('admin.category.list')->with('messages', [
        [
            'type' => 'success',
            'title' => 'Category',
            'message' => 'Category Deleted   successfully',
        ],  ]); 
}

}
