<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class BlogController extends Controller{
    public function index(){
        // $allPosts = [
        //     ['id' => 1, 'title' => 'PHP', 'posted_by' => 'Ahmed', 'created_at' => '2024-10-10 09:00:00'],
        //     ['id' => 2, 'title' => 'Python', 'posted_by' => 'Rana', 'created_at' => '2024-10-10 09:00:00'],
        //     ['id' => 3, 'title' => 'Angular', 'posted_by' => 'Mohamed', 'created_at' => '2024-10-10 09:00:00'],
        //     ['id' => 4, 'title' => 'Laravel', 'posted_by' => 'Reem', 'created_at' => '2024-10-10 09:00:00'],
        //     ['id' => 5, 'title' => 'Go', 'posted_by' => 'Youssef', 'created_at' => '2024-10-10 09:00:00'],
        // ];
        
        // select * from posts
        $postsFromDB = Post::all(); // returns collection object

        // @dd($postsFromDB);
        
        // return view('posts.blog', ['allPosts' => $allPosts]);
        return view('posts.blog', ['allPosts' => $postsFromDB]);
    }
    
    public function show($postId){
        $post = [
            'id' => 2, 'title' => 'Python', 'description' => 'Description', 'created_at' => '2024-10-10 09:00:00',
        ];

        // select * from posts where id = $postId
        // Way 1:
        $postFromDB = Post::find($postId); // returns model object
        //Way2:
        // $postFromDB = Post::where('id', $postId); // returns Eloquent builder
        // $postFromDB = Post::where('id', $postId)->first(); // returns model object, only gets the first item
        // $postFromDB = Post::where('id', $postId)->get(); // returns collection object, if there are more than 1 item

        if(is_null($postFromDB)){
            return to_route("posts.index");
        }
        // other way to handel it during the finding method:
        // $postFromDB = Post::findOrFail($postId);


        // NOTE ==> ROUTE MODEL BINDING:
        // if the parameter is the same name as the parameter in the route, 
        // we can only write this public function show(Post $postId){} and it will detect that he needs to get the post by the id from the DB
        // It works like ==> $post = Post::findOrFail($postId);


        // return view('posts.show', ['post' => $post]);
        return view('posts.show', ['post' => $postFromDB]);
    }
    
    public function create(){
        $users = User :: all();

        return view('posts.create', ["users" => $users]);
    }
    
    public function store(){
        // $data = $_POST;
        // return $data;

        // dd(request() -> title, request() -> all());
        // $data = request() -> all();
        // return $data;

        // $title = request()->title;
        // $description = request()->description;
        // $creator = request()->creator ;

        // First way to add to the DB
        // $post = new Post;
        // $post->title = request()->title;
        // $post->description = request()->description;
        // $post->xyz = "xyz 3";

        // $post -> save();

        // Second way:
        // but this way will be need me to make some changes in the Post model
        // this is more secure
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        
        Post::create([
            'title' => $title,
            'description' => $description,
            'xyz' => '"xyz 3"',
            "user_id" => $postCreator
        ]);
        
        return to_route('posts.index');
    }
    
    public function edit(Post $post){ // $post ==> is the id from the route, and this will get me the post like ($post = Post::findOrFail($postId);)
        $users = User :: all();

        return view('posts.edit', ["users" =>$users, "post" => $post]);
    }
    
    public function update($postId){
        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator ;

        $postFromDB = Post::find($postId);
         
        $postFromDB->update([ 
            'title' => $title,
            'description' => $description,
            'xyz' => '"xyz 3"',
            'user_id' => $post_creator
        ]);

        return to_route('posts.show', $postId);
    }

    public function destroy($postId){
        // dd($postId);
        $postFromDB = Post::find($postId);
        $postFromDB->delete();
        // those are equivelant to ==> Post::where('id', $postId)->delete();

        return to_route('posts.index');
    }
}