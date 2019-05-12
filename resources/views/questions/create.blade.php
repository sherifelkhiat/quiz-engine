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
                    
                    <form method="POST" action="{{ route('question.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('global.title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

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
                                @foreach(["text" ,"text-image"] AS $answerType)    
                                    <option value="{{ $answerType }}">{{ $answerType }}</option>
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
                                @foreach($quizs AS $quiz)    
                                    <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
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
                                    {{ __('global.create') }}
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
