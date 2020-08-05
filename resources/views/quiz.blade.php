<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ mix("/css/app.css") }}">
    <title>{{ config('app.name', 'Quiz test') }}</title>
</head>
<body>
<div id="app">
    <h3 class="text-center">How do you find our service?</h3>
<div class="col-md-5 offset-md-5">
    {!! Form::open(['url' => route('quiz_answer.store')]) !!}
    @csrf
    <div class="form-check">
        {!! Form::radio("answer", 'good', null, ["id"=>"answer1","class"=>"form-check-input".($errors->has("answer") ? "is-invalid" : "")]) !!}
        {!! Form::label("answer1", "Good", ["class" =>"form-check-label"]) !!}
    </div>
    <div class="form-check">
        {!! Form::radio("answer", 'fair', null,["id"=>"answer2","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
        {!! Form::label("answer2", "Fair", ["class" =>"form-check-label"]) !!}
    </div>
    <div class="form-check">
        {!! Form::radio("answer", 'neutral', null,["id"=>"answer3","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
        {!! Form::label("answer3", "Neutral", ["class" =>"form-check-label"]) !!}
    </div>
    <div class="form-check">
        {!! Form::radio("answer", 'bad', null, ["id"=>"answer4","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
        {!! Form::label("answer4", "Bad", ["class" =>"form-check-label"]) !!}
    </div>
    <div>
        @error("answer")
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    {!! Form::close() !!}
</div>
{{--    <example-component></example-component>--}}
</div>
</body>
{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
<script src="{{ mix("/js/app.js") }}"></script>
</html>
