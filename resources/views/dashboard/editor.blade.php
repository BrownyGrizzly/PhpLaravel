@extends('layouts.app')

@section('content')
    <h1>Danh sách bài viết chưa được xuất bản</h1>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
@endsection
