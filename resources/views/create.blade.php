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
    <h3 class="text-center">@{{ title }}</h3>
<div class="col-md-5 offset-md-5">
    {!! Form::open() !!}
    @csrf
    <div v-if="display_form">
        <div class="form-check">
            {!! Form::radio("answer", 'good', null, ["v-model" =>"answer","id"=>"answer1","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
            {!! Form::label("answer1", "A.Good", ["class" =>"form-check-label"]) !!}
        </div>
        <div class="form-check">
            {!! Form::radio("answer", 'fair', null,["v-model" =>"answer","id"=>"answer2","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
            {!! Form::label("answer2", "B.Fair", ["class" =>"form-check-label"]) !!}
        </div>
        <div class="form-check">
            {!! Form::radio("answer", 'neutral', null,["v-model" =>"answer","id"=>"answer3","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
            {!! Form::label("answer3", "C.Neutral", ["class" =>"form-check-label"]) !!}
        </div>
        <div class="form-check">
            {!! Form::radio("answer", 'bad', null, ["v-model" =>"answer","id"=>"answer4","class"=>"form-check-input ".($errors->has("answer") ? "is-invalid" : "")]) !!}
            {!! Form::label("answer4", "D.Bad", ["class" =>"form-check-label"]) !!}
                @error("answer")
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
            <div>
                <button type="button" class="btn btn-primary"  @click="submit">Submit</button>
            </div>
        {!! Form::close() !!}
    </div>

    <span v-html="HTMLcontent"></span>
</div>

</div>
</body>
<script src="{{ mix("/js/app.js") }}"></script>
<script>
    const app = new Vue({
        el: '#app',
        data: {
            display_form: true,
            title: "How do you find our service?",
            answer: " ",
            HTMLcontent: null,
        },
        methods: {
            submit() {
                axios.post(
                    "{{ route("quiz_answer.store") }}",
                    {
                        answer: this.answer,
                    }
                )
                .then((response)=>{
                    this.display_form = false
                    this.HTMLcontent = response.data;
                })

                .catch(function (error) {
                    console.log(error)
                })

            }
        }

    });
</script>
</html>

