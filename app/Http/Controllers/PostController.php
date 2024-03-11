<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function store(Request $request)
    {
        // Validate dữ liệu được gửi từ form
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Tạo một bài viết mới trong cơ sở dữ liệu
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->id = auth()->id();
        $post->category_id = $request->category_id;
        $post->save();

        // Chuyển hướng về trang dashboard của Writer sau khi lưu bài viết thành công
        return redirect()->route('dashboard.writer')->with('success', 'Bài viết đã được đăng thành công.');
    }
}
