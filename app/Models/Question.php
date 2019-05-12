<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $with = 'answers';
    
    protected $fillable = ['title', 'answer_type', 'quiz_id'];

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
