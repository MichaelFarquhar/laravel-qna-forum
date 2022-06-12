<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'topic_id', 'title', 'content', 'slug'];

    /**
     * Get the topic that belongs to the question.
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * Get the user that belongs to the question.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get answers for this question
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Returns the url of a question, which combines the id and the slug
     */
    public function url()
    {
        return '/q/'.$this->id.'/'.$this->slug;
    }
}
