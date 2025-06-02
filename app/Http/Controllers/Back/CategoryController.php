<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('back.category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|min:3|max:255|unique:categories'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|min:3|max:255|unique:categories,name,'.$category->id
        ]);

        $category->update([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category '. $category->name .' Berhasil Dihapus');
    }
}
