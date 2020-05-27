@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Questionnaire</div>

                <div class="card-body">
                    <form method="post" action="{{route('questionnaire.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="titleHelp">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" aria-describedby="titleHelp" placeholder="Give Title">
                            <small id="titleHelp" class="form-text text-muted">Give a cool title that attract user.</small>
                            <div class="text-danger">
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="purposeHelp">Purpose</label>
                            <input type="text" name="purpose" class="form-control" id="purpose" value="{{old('purpose')}}" aria-describedby="purposeHelp" placeholder="Give Purpose">
                            <small id="purposeHelp" class="form-text text-muted">A good purpose can increase the response of customers. </small>
                            <div class="text-danger">
                                @error('purpose')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
