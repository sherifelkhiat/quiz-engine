<?php

namespace App\Http\Controllers\API;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    protected $model;

    public function __construct(Answer $answer)
    {
        // set the model
        $this->model = new BaseRepository($answer);
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
            'result' => 'required|max:500',
            'outcome_type' => 'required',
            'question_id' => 'required',
        ]);

        $answer = $this->model->create($request->only($this->model->getModel()->fillable));
        
        return response()->json(['success' => $answer]);
    }
}
