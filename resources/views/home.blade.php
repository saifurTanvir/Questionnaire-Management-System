@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Questionnaire</div>

                <div class="card-body">
                    <a href="{{route('questionnaire.create')}}" class="btn btn-dark">Create New Questionnaire</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Questionnaires</div>

                <div class="card-body">
                    @foreach($questionnaires as $questionnaire)
                        <div class="list-group-item">
                            <a href="{{route('questionnaire.show', $questionnaire->id)}}">{{$questionnaire->title}}</a>
                            <div class="mt-2">
                                <small>Share URl</small>
                                <p>
                                    <a href="{{route('surveyUrl', [$questionnaire->id, Str::slug($questionnaire->title)])}}">
                                        {{route('surveyUrl', [$questionnaire->id, Str::slug($questionnaire->title)])}}
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
