<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:50',
            'Description' => 'nullable|string|max:255',
        ]);

        Category::create($request->only('Name','Description'));

        return redirect()->route('categories.index')->with('success','Category created');
    }

    public function show($id)
    {
        $category = Category::with('posts')->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'Name' => 'required|string|max:50',
            'Description' => 'nullable|string|max:255',
        ]);
        $category->update($request->only('Name','Description'));

        return redirect()->route('categories.index')->with('success','Category updated');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('success','Category deleted');
    }
}