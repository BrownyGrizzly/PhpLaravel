<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function reader()
    {
        // Logic để lấy danh sách bài viết cho vai trò reader
        $posts = Post::all();

        return view('dashboard.reader', compact('posts'));
    }

    public function editor()
    {
        // Logic để lấy danh sách bài viết cho vai trò editor
        $posts = Post::where('status', 'draft')->get();

        return view('dashboard.editor', compact('posts'));
    }

    public function writer()
    {
        // Logic để hiển thị form thêm bài viết mới cho vai trò writer
        return view('dashboard.writer');
    }

}
