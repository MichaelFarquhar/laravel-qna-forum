<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id'];

    /**
     * Get the question for the bookmark
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
