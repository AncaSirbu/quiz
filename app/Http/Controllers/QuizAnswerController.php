<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizAnswer;
use App\QuizAnswer;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\SelectorNode;

class QuizAnswerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreQuizAnswer  $request Request
     *
     */
    public function store(StoreQuizAnswer $request)
    {
        $quiz_answer = new QuizAnswer();
        $tmp = $request->input("answer");
        $quiz_answer->$tmp = 1;
        $quiz_answer->save();

        return QuizAnswer::query()
            ->selectRaw("sum(good) as Good, sum(fair) as Fair, sum(neutral) as Neutral, sum(bad) as Bad")
            ->first()
            ->toArray();
    }
}
