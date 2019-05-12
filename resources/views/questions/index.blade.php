@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('partials.menus')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('global.questions') }}</div>
                <a href="{{ route('question.create') }}" class="btn btn-primary">{{ __('global.create_question') }}</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    


<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('global.title') }}</th>
                <th>{{ __('global.answer_type') }}</th>
                <th>{{ __('global.quiz_title') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ $question->title }}</td>
                <td>{{ $question->answer_type }}</td>
                @if($question->quiz)
                <td>{{ $question->quiz->title }}</td>
                @else
                <td></td>
                @endif
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('global.title') }}</th>
                <th>{{ __('global.answer_type') }}</th>
                <th>{{ __('global.quiz_title') }}</th>
            </tr>
        </tfoot>
    </table>
                    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
