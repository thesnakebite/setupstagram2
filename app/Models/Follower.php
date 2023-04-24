<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follower_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function follower()
    {
        return $this->belongTo(User::class);
    }

    public static function follow($user_id)
    {
        return (new static)::create([
            'user_id' => $user_id,
            'follower_id' => auth()->user()->id
        ]);
    }
}
