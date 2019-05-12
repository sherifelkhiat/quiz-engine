<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    
    protected $fillable = ['result', 'outcome_type', 'question_id'];
}
