<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
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
        $posts = $user->posts()->count();

        return Inertia::render('UserProfile/Index', [
            'user' => $user,
            'followers' => $followers,
            'followed' => $followed,
            'postsCount' => $posts
        ]);
    }
}
