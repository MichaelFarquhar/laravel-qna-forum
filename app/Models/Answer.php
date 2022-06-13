<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id', 'answer'];

    /**
     * Get the user that belongs to the answer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the question that belongs to the answer.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get all the comments for an answer
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
