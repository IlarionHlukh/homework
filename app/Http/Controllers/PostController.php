<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all Posts, ordered by the newest first
        $posts = Post::latest()->get();

        // Pass Post Collection to view
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',[
            'post'=>'',
            'categories'=>Category::with('children')->where('parent_id',0)->get(),
            'delimetr'=>''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post, Category $category): RedirectResponse
    {

        $post = New Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->user_id = $request->user()->id;
        $post->slug=Str::slug($post['title'], '-');
        $this->uploadImage($request, $post);
        $post->save();
        return redirect(route('posts.show', $post))->with('success', 'Пост створенний успішно!');
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\Response
         */
        public function show(Post $post)
        {
            return view('posts.show', compact('post'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\Response
         */
        public function edit(Post $post, Category $category)
        {
            if ($post->user_id != Auth::id()) {
                return redirect()->back();
            }

            $categories = Category::with('children')->where('parent_id', 0)->get();

            return view('posts.edit', compact('post', 'categories'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Post $post)
        {

            $validated = $request->validate([
                'title' => 'required|string|unique:posts|min:5|max:100',
                'content' => 'required|string|min:5|max:2000',
                'category_id'
            ]);

            $validated['slug'] = Str::slug($validated['title'], '-');

            $post->update($validated);

            return redirect(route('posts.show', $post))->with('notification', 'Post updated!');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\Response
         */
        public function destroy(Post $post)
        {
            if ($post->user_id != Auth::id()) {
                return redirect()->back()->with('message',"Тільки автор може видалити пост!");;
            }
            // Delete the specified Post
            $post->delete();

            // Redirect user with a deleted notification
            return redirect(route('posts.index'))->with('notification', '"' . $post->title . '" deleted!');
        }

        private function uploadImage(Request $request, Post $post)
        {

            if ($request->input('remove')) {
                if (!empty($post->image)) {
                    $name = basename($post->image);
                    if (Storage::exists('public/image/image/' . $name)) {
                        Storage::delete('public/image/image/' . $name);
                    }
                    $post->image = null;
                }

                if (!empty($name)) {
                    $images = Storage::files('public/image/storage');
                    $base = pathinfo($name, PATHINFO_FILENAME);
                    foreach ($images as $img) {
                        $temp = pathinfo($img, PATHINFO_FILENAME);
                        if ($temp == $base) {
                            Storage::delete($img);
                            break;
                        }
                    }
                }
            }

            $source = $request->file('image');
            if ($source) {
                $ext = str_replace('jpeg', 'jpg', $source->extension());

                $name = md5(uniqid());
                Storage::putFileAs('public/image/source', $source, $name . '.' . $ext);

                $image = Image::make($source)
                    ->resizeCanvas(1200, 400, 'center', false, 'dddddd')
                    ->encode('jpg', 100);

                Storage::put('public/image/image/' . $name . '.jpg', $image);
                $image->destroy();
                $post->image = Storage::url('public/image/image/' . $name . '.jpg');

            }
        }
    }

