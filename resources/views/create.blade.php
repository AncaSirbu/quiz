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
            {!! Form::radio("answer", 'good', null, ["v-model" =>"answer","id"=>"answer1","class"=>"form-check-input "]) !!}
            {!! Form::label("answer1", "A.Good", ["class" =>"form-check-label"]) !!}
        </div>
        <div class="form-check">
            {!! Form::radio("answer", 'fair', null,["v-model" =>"answer","id"=>"answer2","class"=>"form-check-input "]) !!}
            {!! Form::label("answer2", "B.Fair", ["class" =>"form-check-label"]) !!}
        </div>
        <div class="form-check">
            {!! Form::radio("answer", 'neutral', null,["v-model" =>"answer","id"=>"answer3","class"=>"form-check-input "]) !!}
            {!! Form::label("answer3", "C.Neutral", ["class" =>"form-check-label"]) !!}
        </div>
        <div class="form-check">
            {!! Form::radio("answer", 'bad', null, ["v-model" =>"answer","id"=>"answer4","class"=>"form-check-input "]) !!}
            {!! Form::label("answer4", "D.Bad", ["class" =>"form-check-label"]) !!}
        </div>
        <div class="alert alert-danger" v-if="errors && errors.answer">
            @{{ errors.answer[0] }}
        </div>
            <div>
                <button type="button" class="btn btn-primary"  @click="submit">Submit</button>
            </div>
        {!! Form::close() !!}
    </div>
    <div>
        <ol type="A">
            <li  v-for="(quiz_answer, name) in quiz_answers">
                @{{ name }} @{{ (quiz_answer / total * 100).toFixed(0) }} %  @{{ quiz_answer }} - results
            </li>
        </ol>
    </div>
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
            quiz_answers: null,
            errors: {},
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
                    this.quiz_answers = response.data;
                    this.total = +this.quiz_answers.Good + +this.quiz_answers.Fair + +this.quiz_answers.Neutral + +this.quiz_answers.Bad
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                })
            }
        },

    });
</script>
</html>

