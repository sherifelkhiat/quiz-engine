@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('partials.menus')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('global.quizs') }}</div>
                <a href="{{ route('quiz.create') }}" class="btn btn-primary">{{ __('global.create_quiz') }}</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    


<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('global.name') }}</th>
                <th>{{ __('global.title') }}</th>
                <th>{{ __('global.description') }}</th>
                <th>{{ __('global.control') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quizs as $quiz)
            <tr>
                <td>{{ $quiz->name }}</td>
                <td>{{ $quiz->title }}</td>
                <td>{{ $quiz->description }}</td>
                <td><a class="btn btn-primary" href="{{ url(route('quiz.edit',['quiz' => $quiz->id])) }}">{{ __('global.edit') }}</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('global.name') }}</th>
                <th>{{ __('global.title') }}</th>
                <th>{{ __('global.description') }}</th>
                <th>{{ __('global.control') }}</th>
            </tr>
        </tfoot>
    </table>
                    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
