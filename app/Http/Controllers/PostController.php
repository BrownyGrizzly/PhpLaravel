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
        ]);

        // Tạo một bài viết mới trong cơ sở dữ liệu
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id(); // Lấy ID của người dùng hiện tại
        $post->save();

        // Chuyển hướng về trang dashboard của Writer sau khi lưu bài viết thành công
        return redirect()->route('dashboard.writer')->with('success', 'Bài viết đã được đăng thành công.');
    }
}
