<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Tạo dữ liệu cho 3 category
        Category::factory(3)->create()->each(function ($category) {
            // Tạo dữ liệu cho 3 người dùng với role khác nhau trong mỗi category
            $users = User::factory(3)->create();

            // Gán vai trò cho người dùng trong mỗi category
            $users[0]->update(['role' => 'reader']);
            $users[1]->update(['role' => 'editor']);
            $users[2]->update(['role' => 'writer']);

            // Tạo 2 bài viết cho mỗi category
            $category->posts()->createMany([
                ['title' => 'Bài viết 1', 'content' => 'Nội dung bài viết 1 ngắn'],
                ['title' => 'Bài viết 2', 'content' => 'Nội dung bài viết 2 ngắn']
            ]);
        });
    }
}
