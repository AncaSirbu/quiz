<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QuizAnswer
 * @package App
 * @property integer $id
 * @property boolean $good
 * @property boolean $fair
 * @property boolean $neutral
 * @property boolean $bad
 */

class QuizAnswer extends Model
{
    protected $table = "quiz_answers";

}
