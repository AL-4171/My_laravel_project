<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:50',
        ]);

        Tag::create($request->only('Name'));

        return redirect()->route('tags.index')->with('success','Tag created');
    }

    public function show($id)
    {
        $tag = Tag::with('posts')->findOrFail($id);
        return view('tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $request->validate([
            'Name' => 'required|string|max:50',
        ]);
        $tag->update($request->only('Name'));

        return redirect()->route('tags.index')->with('success','Tag updated');
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return redirect()->route('tags.index')->with('success','Tag deleted');
    }
}
