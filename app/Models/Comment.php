<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'answer_id', 'comment'];

    /**
     * Get the user for this comment
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
