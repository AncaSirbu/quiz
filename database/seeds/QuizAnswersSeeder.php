<?php

use App\QuizAnswer;
use Illuminate\Database\Seeder;

class QuizAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz_answer = new QuizAnswer([
            'good' => true,
            'fair' => false,
            'neutral' => false,
            'bad' => false,
        ]);
        $quiz_answer->save();

        $quiz_answer = new QuizAnswer([
            'good' => false,
            'fair' => true,
            'neutral' => false,
            'bad' => false,
        ]);
        $quiz_answer->save();

        $quiz_answer = new QuizAnswer([
            'good' => false,
            'fair' => false,
            'neutral' => true,
            'bad' => false,
        ]);
        $quiz_answer->save();

        $quiz_answer = new QuizAnswer([
            'good' => true,
            'fair' => false,
            'neutral' => false,
            'bad' => true,
        ]);
        $quiz_answer->save();

        $quiz_answer = new QuizAnswer([
            'good' => true,
            'fair' => false,
            'neutral' => false,
            'bad' => false,
        ]);
        $quiz_answer->save();
    }
}
