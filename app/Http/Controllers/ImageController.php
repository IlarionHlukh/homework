<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function getForm()
    {
        return view('image');
    }

    public function upload(Request $request, Post $post)
    {
        $post = New Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = $request->user()->id;
        $post->category_id = $request->input('category');
        $post->slug=Str::slug($post['title'], '-');
        $source = $request->file('image');
        dd($source);
        if ($source) {
            $ext = str_replace('jpeg', 'jpg', $source->extension());

            $name = md5(uniqid());
            Storage::putFileAs('public/image/source', $source, $name. '.' . $ext);

            $image = Image::make($source)
                ->resizeCanvas(1200, 400, 'center', false, 'dddddd')
                ->encode('jpg', 100);

            Storage::put('public/image/image/' . $name . '.jpg', $image);
            $image->destroy();
        }
        $post->image=Storage::url('public/image/image/' . $name . '.jpg');

        $post->save();
        dd($post);

        return view('image', compact('post'));
    }
}
