<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\OnlineEvent;
use Illuminate\Http\Request;

class OnlineController extends Controller
{
    public function __invoke($id)
    {
        User::where('id', $id)->update([
            'status' => 1
        ]);

        event(new OnlineEvent(User::find($id)));
        
    }
}
