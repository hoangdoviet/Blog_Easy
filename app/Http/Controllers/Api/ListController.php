<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class ListController extends Controller
{
    public function posts()
    {
        $posts = Post::with(['user', 'category', 'tags', 'comments'])->paginate(2);
        return PostResource::collection($posts);
    }
    public function comments()
    {
        $comments = Comment::paginate(10);

        return CommentResource::collection($comments);
    }
    public function tags()
    {
        $tags = Tag::paginate(10);

        return TagResource::collection($tags);
    }

    public function categories()
    {
        $categories = Category::paginate(10);

        return CategoryResource::collection($categories);
    }

    public function users()
    {
        $users = User::paginate(10);

        return UserResource::collection($users);
    }
}
