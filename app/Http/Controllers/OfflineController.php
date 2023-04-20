<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\OfflineEvent;
use Illuminate\Http\Request;

class OfflineController extends Controller
{
    public function __invoke($id)
    {
        User::where('id', $id)->update([
            'status' => 0,
        ]);

        event(new OfflineEvent(User::find($id)));

    }
}
