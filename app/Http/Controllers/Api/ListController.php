<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\User;

class ListingController extends Controller
{
    public function tags()
    {
        $tags = Tag::paginate(10);

        return $tags;
    }

    public function categories()
    {
        $categories = Category::paginate(10);

        return $categories;
    }

    public function users()
    {
        $users = User::paginate(10);

        return $users;
    }
}
