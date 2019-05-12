<?php

namespace App\Http\Controllers\API;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Http\Controllers\Controller;
use Storage;
use File;

class QuizController extends Controller
{
    protected $model;

    public function __construct(Quiz $quiz)
    {
        // set the model
        $this->model = new BaseRepository($quiz);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizs = $this->model->with('question')->get(); 

        return response()->json(['success' => $quizs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return response()->json(['success' => $quiz]);
    }
}
