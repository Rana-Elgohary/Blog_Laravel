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
    
    public function create(){

        return view('posts.create');
    }
    
    public function store(){
        // $data = $_POST;
        // return $data;

        // dd(request() -> title, request() -> all());
        $data = request() -> all();
        // return $data;

        $title = request()->title;
        $description = request()->description;
        $creator = request()->creator ;

        return to_route('posts.index');
    }
    
    public function edit(){

        return view('posts.edit');
    }
    
    public function update(){
        $title = request()->title;
        $description = request()->description;
        $creator = request()->creator ;

        return to_route('posts.show', 1);
    }

    public function destroy(){

        return view('posts.index');
    }
}