<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * A question has a single topic
     */
    public function question()
    {
        $this->hasOne(Question::class);
    }
}
