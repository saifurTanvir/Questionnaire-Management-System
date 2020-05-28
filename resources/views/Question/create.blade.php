@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Question</div>

                <div class="card-body">
                    <form method="post" action="{{route('question.store', $questionnaire->id)}}">
                        @csrf

                        <div class="form-group">
                            <label for="questionHelp">Question</label>
                            <input type="text" name="question[question]" class="form-control" id="question"
                                   value="{{old('question.question')}}" aria-describedby="questionHelp" placeholder="Enter Question">
                            <small id="questionHelp" class="form-text text-muted">A good and point-to-point question attract customer.</small>
                            <div class="text-danger">
                                @error('question.question')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <small id="answersHelp" class="form-text text-muted">Choices most relevant answer for the question.</small>
                                <div class="form-group">
                                    <label for="answersHelp">Answer 1</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="answers"
                                           value="{{old('answers.0.answer')}}" aria-describedby="answersHelp" placeholder="Choice 1">
                                    <small id="answersHelp" class="form-text text-muted">Give relevant answer for the question. </small>
                                    <div class="text-danger">
                                        @error('answers.0.answer')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="answersHelp">Answer 2</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="answers"
                                           value="{{old('answers.1.answer')}}" aria-describedby="answersHelp" placeholder="Choice 2">
                                    <small id="answersHelp" class="form-text text-muted">Give relevant answer for the question. </small>
                                    <div class="text-danger">
                                        @error('answers.1.answer')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="answersHelp">Answer 3</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="answers"
                                           value="{{old('answers.2.answer')}}" aria-describedby="answersHelp" placeholder="Choice 3">
                                    <small id="answersHelp" class="form-text text-muted">Give relevant answer for the question. </small>
                                    <div class="text-danger">
                                        @error('answers.2.answer')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="answersHelp">Answer 4</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="answers"
                                           value="{{old('answers.3.answer')}}" aria-describedby="answersHelp" placeholder="Choice 4">
                                    <small id="answersHelp" class="form-text text-muted">Give relevant answer for the question. </small>
                                    <div class="text-danger">
                                        @error('answers.3.answer')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
