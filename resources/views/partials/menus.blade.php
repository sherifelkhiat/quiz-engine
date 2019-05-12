<div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="{{ route('quiz.index') }}" role="tab" aria-controls="home">{{ __('global.quizs') }}</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="{{ route('question.index') }}" role="tab" aria-controls="profile">{{ __('global.questions') }}</a>
    </div>
</div>