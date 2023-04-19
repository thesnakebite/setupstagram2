<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    private $user;
    private $followers;

    public function __construct(User $user, Follower $followers)
    {
        $this->user = $user;
        $this->followers = $followers;
    }

    public function index($nick_name)
    {
        $user = $this->user->where('nick_name', $nick_name)->first();

        $followers = $user->followers()->count();
        $followed = $this->followers->where('follower_id', $user->id)->count();
        $postsCount = $user->posts()->count();
        $posts = Post::getPosts($user->id, true);

        return Inertia::render('UserProfile/Index', [
            'userProfile' => $user,
            'followers' => $followers,
            'followed' => $followed,
            'postsCount' => $postsCount,
            'posts' => $posts
        ]);
    }
}
