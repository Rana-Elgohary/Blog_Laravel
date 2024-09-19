<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller{
    public function index(){
        $allPosts = [
            ['id' => 1, 'title' => 'PHP', 'posted_by' => 'Ahmed', 'created_at' => '2024-10-10 09:00:00'],
            ['id' => 2, 'title' => 'Python', 'posted_by' => 'Rana', 'created_at' => '2024-10-10 09:00:00'],
            ['id' => 3, 'title' => 'Angular', 'posted_by' => 'Mohamed', 'created_at' => '2024-10-10 09:00:00'],
            ['id' => 4, 'title' => 'Laravel', 'posted_by' => 'Reem', 'created_at' => '2024-10-10 09:00:00'],
            ['id' => 5, 'title' => 'Go', 'posted_by' => 'Youssef', 'created_at' => '2024-10-10 09:00:00'],
        ];

        return view('posts.blog', ['allPosts' => $allPosts]);
    }
    
    public function show($postId){

        return view('posts.show');
    }
}