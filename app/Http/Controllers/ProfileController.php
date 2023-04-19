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

    public function index()
    {
        return Inertia::render('UserProfile/Index');
    }
}
