@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert-info">{{session('updateQuestion')}}</div>
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
                                <li class="list-group-item  d-flex justify-content-lg-between">{{$answer->answer}}
                                    @if($question->response->count())
                                        <div>{{(int)(($answer->response->count() * 100) / $question->response->count() )}}%</div>
                                    @endif
                                </li>
                            @endforeach

                            <div class="mt-4 d-flex justify-content-lg-between">

                                <a href="{{route('question.edit', [$questionnaire->id,$question->id])}}" class="btn btn-sm btn-outline-primary ">Edit</a>


                                <form  method="POST" action="{{route('question.delete', [$questionnaire->id,$question->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger align-content-end">Delete</button>
                                </form>
                            </div>



                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
