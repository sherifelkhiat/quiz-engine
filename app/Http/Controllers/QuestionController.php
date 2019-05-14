<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;

class QuestionController extends Controller
{
    protected $model;

    protected $quizModel;

    public function __construct(Question $question, Quiz $quiz)
    {
        // set the models
        $this->model = new BaseRepository($question);

        $this->quizModel = new BaseRepository($quiz);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->model->with('quiz')->get();

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizs = $this->quizModel->all();

        return view('questions.create', compact('quizs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'answer_type' => 'required',
            'quiz_id' => 'required',
        ]);

        $this->model->create($request->only($this->model->getModel()->fillable));
        
        return back()->withSuccess(__('global.new_question_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $quizs = $this->quizModel->all();

        return view('questions.edit', compact('question', 'quizs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $this->validate($request, [
            'title' => 'required|max:500',
            'answer_type' => 'required',
            'quiz_id' => 'required',
        ]);

        $this->model->update($request->only($this->model->getModel()->fillable), $question->id);
        
        return back()->withSuccess(__('global.question_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
