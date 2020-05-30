@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Please Complete The Survey!</h1>
                <form method="post" action="/survey/{{$questionnaire->id}}-{{Str::slug('questionnaire->title')}}">
                    @csrf
                    <div class="card">
                        <div class="card-header">Answer all the question which is most relevant.</div>
                        <div class="card-body">
                            @foreach($questionnaire->questions as $key => $question)
                                <div class="card mt-4">
                                    <div class="card-header"><strong>{{$key+1}} </strong>{{$question->question}}</div>

                                    <div class="card-body">
                                        <div class="text-danger">
                                            @error('response.' . $key . '.answer_id')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <ul class="list-group">
                                            @foreach($question->answers as $answer)
                                               <label for="answer{{$answer->id}}">
                                                   <li class="list-group-item">
                                                       <input type="radio" name="response[{{$key}}][answer_id]"
                                                              {{(old('response.' .$key. '.answer_id') == $answer->id) ? 'checked' : ''}}
                                                              value="{{$answer->id}}" id="answer{{$answer->id}}"> {{$answer->answer}}
                                                   </li>
                                               </label>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <input type="hidden" name="response[{{$key}}][question_id]"
                                           value="{{$question->id}}" >
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="nameHelp">Name</label>
                                    <input type="text" name="survey[name]" class="form-control" id="title" value="{{old('survey.name')}}" aria-describedby="nameHelp" placeholder="Enter Name">
                                    <small id="nameHelp" class="form-text text-muted">Hello! what's your name?</small>
                                    <div class="text-danger">
                                        @error('survey.name')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="emailHelp">Email</label>
                                    <input type="email" name="survey[email]" class="form-control" id="email" value="{{old('survey.email')}}" aria-describedby="emailHelp" placeholder="Enter Email">
                                    <small id="emailHelp" class="form-text text-muted">Give your email please! </small>
                                    <div class="text-danger">
                                        @error('survey.email')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
