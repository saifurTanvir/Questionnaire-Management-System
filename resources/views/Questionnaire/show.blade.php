@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$questionnaire->title}}</div>

                <div class="card-body">
                    <a class="btn btn-dark" href="{{route('question.create', $questionnaire->id)}}">Create New Question</a>
                    <a class="btn btn-dark" href="/survey/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}">Take Survey</a>
                </div>
            </div>

            @foreach($questionnaire->questions as $key => $question)
                <div class="card mt-4">
                    <div class="card-header"><strong>{{$key+1}} </strong>{{$question->question}}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                                <li class="list-group-item">{{$answer->answer}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
