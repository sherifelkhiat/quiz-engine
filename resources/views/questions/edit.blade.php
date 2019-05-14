@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('partials.menus')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('global.create_question') }}</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('question.update', ['id' => $question->id]) }}">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('global.title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title', $question->title)}}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="answer_type" class="col-md-4 col-form-label text-md-right">{{ __('global.answer_type') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name="answer_type">
                                @foreach(["text" ,"text-image"] as $answerType) 
                                  @if($question->answer_type == $answerType) 
                                    <option value="{{ $answerType }}" selected>{{ $answerType }}</option>
                                  @else
                                    <option value="{{ $answerType }}">{{ $answerType }}</option>
                                  @endif
                                @endforeach
                            </select>

                                @error('answer_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="answer_type" class="col-md-4 col-form-label text-md-right">{{ __('global.quizs') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name="quiz_id">
                                @foreach($quizs as $quiz) 
                                    @if($question->quiz_id == $quiz->id)
                                        <option value="{{ $quiz->id }}"selected>{{ $quiz->title }}</option>
                                    @else
                                        <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                    @endif
                                @endforeach
                            </select>

                                @error('answer_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('global.update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
