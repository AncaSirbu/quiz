<?php

namespace App\Http\Controllers;

use App\QuizAnswer;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\SelectorNode;

class QuizAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $quiz_answer = new QuizAnswer();
        $tmp = $request->input("answer");
        $quiz_answer->$tmp = 1;
        $quiz_answer->save();

        $quiz_answers = QuizAnswer::query()
            ->selectRaw("sum(good) as Good, sum(fair) as Fair, sum(neutral) as Neutral, sum(bad) as Bad")
            ->first()
            ->toArray();
        $total_answers = array_sum($quiz_answers);

        return view("test", compact("quiz_answers", "total_answers"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
