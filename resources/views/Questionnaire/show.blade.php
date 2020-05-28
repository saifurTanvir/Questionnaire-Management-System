@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$questionnaire->title}}</div>

                <div class="card-body">
                    <a class="btn btn-dark" href="{{route('question.create', $questionnaire->id)}}">Create New Question</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
