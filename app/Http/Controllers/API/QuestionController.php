<?php

namespace App\Http\Controllers\API;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Http\Controllers\Controller;
use Storage;
use File;

class QuestionController extends Controller
{
    protected $model;

    public function __construct(Question $question)
    {
        // set the model
        $this->model = new BaseRepository($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return response()->json(['success' => $question]);
    }
}
