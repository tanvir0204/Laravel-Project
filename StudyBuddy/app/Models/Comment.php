<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment_id', 'user_id', 'listing_id', 'text'];

    use HasFactory;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function problems()
    {
        return $this->belongsTo(Problem::class, 'listing_id');
    }
}
