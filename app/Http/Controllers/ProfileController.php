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
        
        $postsCount = $user->posts()->count();
        $posts = Post::getPosts($user->id, true);

        return Inertia::render('UserProfile/Index', [
            'userProfile' => $user,
            'postsCount' => $postsCount,
            'posts' => $posts
        ]);
    }
}
