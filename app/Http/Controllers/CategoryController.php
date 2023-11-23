<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;

class CategoryController extends Controller
{
    public Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index-category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect('category')->with('success', 'Category added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $data = $category->find('id');
        return view('category.edit-category', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()
            ->route('category.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('category.index')
            ->with('success', 'category deleted successfully');
    }

    public function search(Request $request, category $category)
    {
        if ($request->has('search')) {
            $category = Category::where('category_name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $category = Category::all();
        }

        return view('category.index-category', ['categories' => $category]);
    }
}
