<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get questions for this user
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get answers for this user
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Get bookmarks for this user
     */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    /**
     * Returns true if user has bookmarked a question given it's id
     */
    public function hasQuestionBookmarked($question_id)
    {
        return $this->bookmarks()->where('question_id', $question_id)->count() > 0;
    }
}
