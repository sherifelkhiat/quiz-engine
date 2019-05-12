<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizs';

    protected $with = 'question';
    
    protected $fillable = ['name', 'title', 'description', 'image'];

    public function question()
    {
        return $this->hasOne('App\Models\Question', 'quiz_id', 'id');
    }
}
