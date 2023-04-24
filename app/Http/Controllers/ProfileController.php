<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Follower;
use Illuminate\Http\Request;
use App\Notifications\NotifyFollow;

class ProfileController extends Controller
{
    private $user;
    private $followers;

    public function __construct(User $user, Follower $followers){
        $this->user = $user;
        $this->followers = $followers;
    }

    public function index($nick_name)
    {
        $user = $this->user->where('nick_name', $nick_name)->first();

        // $followers = $user->followers()->count();
        // $followed = $this->followers->where('follower_id',$user->id)->count();
        $postsCount = $user->posts()->count();
        $posts = Post::getPost($user->id,true);

        return Inertia::render('UserProfile/Index',[
            'userProfile' => $user,
            // 'followers' => $followers,
            // 'followed' => $followed,
            'postsCount' => $postsCount,
            'posts' => $posts,
        ]);
    }

    public function followUser(Request $request)
    {
        $user = User::find($request->user_id);

        $user->notify(new NotifyFollow(auth()->user()));

        return $this->followers->follow($request->user_id);
    }

    public function unFollow(Request $request)
    {
        $follow = $this->followers
            ->where('user_id', $request->user_id)
            ->where('follower_id', auth()->user()->id)
            ->first();

        return $follow->delete();
    }

    public function existsFollow($user_id)
    {
        return $this->followers
            ->where('user_id', $user_id)
            ->where('follower_id', auth()->user()->id)
            ->exists() ? 
            ['exists' => true] 
            : 
            ['exists' => false];
    }

    public function markAsRead()
    {
        $user = auth()->user();
        $user->unreadNotifications->markAsRead();

        return $user->notifications;
    }
}
