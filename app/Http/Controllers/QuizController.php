<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
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
        $quizs = $this->model->all(); 

        return view('quizs.index', compact('quizs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizs.create');
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
            'name' => 'required|max:500',
            'title' => 'required|max:500',
            'description' => 'required|max:500',
            'image' => 'required|max:500'
        ]);

        $image = $request->file('image');

        $extension = $image->getClientOriginalExtension();

        $imageFullName = $image->getFilename().'.'.$extension;

        Storage::disk('public')->put($imageFullName,  File::get($image));

        $requestedData = $request->only($this->model->getModel()->fillable);

        $requestedData['image'] = url('/uploads').'/'.$imageFullName;

        $this->model->create($requestedData);
        
        return back()->withSuccess(__('global.new_quiz_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        return view('quizs.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $this->validate($request, [
            'name' => 'required|max:500',
            'title' => 'required|max:500',
            'description' => 'required|max:500',
        ]);

        $requestedData = $request->only($this->model->getModel()->fillable);
        
        if ($request->has('image')) {
            $image = $request->file('image');

            $extension = $image->getClientOriginalExtension();
    
            $imageFullName = $image->getFilename().'.'.$extension;
    
            Storage::disk('public')->put($imageFullName,  File::get($image));

            $requestedData['image'] = url('/uploads').'/'.$imageFullName;
        } else {
            $imageFullName = $quiz->image;
        }

        $this->model->update($requestedData, $quiz->id);
        
        return back()->withSuccess(__('global.quiz_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
