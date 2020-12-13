<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @mixin Eloquent
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', [
            'category'   => [],
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        (new \App\Models\Category)->create($request->all());
        return redirect()
            ->route('category.index')
            ->with('success', 'Новая категория успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::with('posts')->get();

        return view('admin.categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Validate posted form data
        $validated = $request->validate([
            'title'    => 'required|string|unique:posts|min:5|max:100',
            'content'  => 'required|string|min:5|max:2000',
        ]);

        // Create slug from title
        $validated['slug'] = Str::slug($validated['title'], '-');

        // Update Post with validated data
        $category->update($validated);

        // Redirect the user to the created post woth an updated notification
        return redirect()
            ->route('category.index', ['category' => $category->id])
            ->with('success', 'Категорія була успішно виправлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!empty($errors)) {
            return back()->withErrors($errors);
        }
        $category->delete();

        return redirect()
            ->route('category.index')
            ->with('success', 'Категорія блога успішно видалена!');
    }
}
