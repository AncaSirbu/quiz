<template>
    <h1>{{title}}</h1>

    <div class="form-group" v-if="display_form">
        <label for="good">
            <input type="radio"
                   id="good"
                   value="good"
                   v-model="answer"
            >
            A.Good
        </label>
        <br>
        <label for="fair">
            <input type="radio"
                   id="fair"
                   value="fair"
                    v-model="answer"
            >
            B.Fair
        </label>
        <br>
        <label for="neutral">
            <input type="radio"
                   id="neutral"
                   value="neutral"
            v-model="answer">
            C.Neutral
        </label>
        <br>
        <label for="bad">
            <input type="radio"
                   id="bad"
                   value="bad"
            v-model="answer">
            D.Bad
        </label>
        <button @click="submit">Submit</button>
    </div>
    <div>
        <ol type="A">
            <li  v-for="(quiz_answer, name) in quiz_answers">
                {{ name }} {{ (quiz_answer / total * 100).toFixed(0) }} %  {{ quiz_answer }} - results
            </li>
        </ol>
    </div>

</template>

<script>

export default {
    data() {
        return {
            display_form: true,
            title: "How do you find our service?",
            answer: " ",
            quiz_answers: null,
            errors: {},
            total: 0,
        }
    },

    methods: {
        submit() {
            axios.post(
                "quiz",
                {
                    answer: this.answer,
                }
            )
                .then((response) => {
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
    }
}

</script>
