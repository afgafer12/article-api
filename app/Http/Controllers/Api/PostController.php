<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostController extends Controller
{

    public function getPosts(Request $request){
        $qPosts = Post::query();
        if($request->status){
            $qPosts->where('status', $request->status);
        }
        $posts = $qPosts->get();
        return  new PostCollection($posts);
    }
    public function getPost($id){
        $post = Post::find($id);
        if (!$post) {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    "message" => [
                        "not found"
                    ]
                ]
            ])->setStatusCode(404));
        }
        return new PostResource($post);
    }
    public function createPost(PostRequest $request){
        $post = new Post();
        $post->title = $request->title;  
        $post->content = $request->content;  
        $post->category = $request->category;  
        $post->status = $request->status;  
        $post->save();
        return (new PostResource($post))->response()->setStatusCode(201);
    }

    public function updatePost($id, PostRequest $request): PostResource
    {
        $post = Post::find($id);
        $post->title = $request->title;  
        $post->content = $request->content;  
        $post->category = $request->category;  
        $post->status = $request->status;  
        $post->save();
        return new PostResource($post);
    }
}
