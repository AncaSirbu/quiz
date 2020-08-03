<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Quiz test') }}</title>

</head>

<body>
<h2>How do you find our service?</h2>
<div>
    {!! Form::open(['url' => route('quiz_answer.store')]) !!}
    @csrf
    <div class="form-check">
        {!! Form::label("answer1", "Good", ["class" =>"form-check-label"]) !!}
        <div class="col-sm-10">
            {!! Form::radio("answer", 'good', null, ["id"=>"answer1","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
            @error("answer")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div >
        {!! Form::label("answer2", "Fair", ["class" =>"form-check-label"]) !!}
        <div>
            {!! Form::radio("answer", 'fair', null,["id"=>"answer2","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
            @error("answer")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div >
        {!! Form::label("answer3", "Neutral", ["class" =>"form-check-label"]) !!}
        <div>
            {!! Form::radio("answer", 'neutral', null,["id"=>"answer3","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
            @error("answer")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div >
        {!! Form::label("answer4", "Bad", ["class" =>"form-check-label"]) !!}
        <div>
            {!! Form::radio("answer", 'bad', null, ["id"=>"answer4","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
            @error("answer")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
</body>

</html>
