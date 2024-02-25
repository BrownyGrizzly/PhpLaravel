@extends('layouts.app')

@section('content')
    <h1>Thêm bài viết mới</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Tiêu đề:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Nội dung:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">Đăng</button>
    </form>
@endsection
