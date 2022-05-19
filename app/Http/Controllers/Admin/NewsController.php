<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $post = $request->query->get('post', '');
        $post = Post::find($post);
        $posts = Post::paginate(40);
        return view('admin.news', compact('posts', 'post'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:12'],
            'content' => ['required', 'min:12'],
        ]);
        try {
            DB::beginTransaction();
            Post::create(['title' => $data['title'], 'content' => $data['content']]);
            DB::commit();
            return redirect()->route('admin.news', []);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->view('errors.500', ['message' => $e->getMessage()]);
        }
    }
    public function delete(Post $post, Request $request)
    {
        try {
            $post->delete();
            return redirect()->route('admin.news');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->view('errors.500', ['message' => $e->getMessage()]);
        }
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'post_id' => [],
            'title' => ['required', 'min:12'],
            'content' => ['required', 'min:12'],
        ]);
        try {
            DB::beginTransaction();
            Post::where('id', $data['post_id'])->update(['title' => $data['title'], 'content' => $data['content']]);
            DB::commit();
            return redirect()->route('admin.news');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->view('errors.500', ['message' => $e->getMessage()]);
        }
    }
}
