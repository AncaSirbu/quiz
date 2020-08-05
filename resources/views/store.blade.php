<ol type="A">
    @foreach($quiz_answers as $quiz_answer => $item)
        <li>{{$quiz_answer." ". number_format($item / $total_answers * 100, 0) ."% - ".$item." results"}}</li>
    @endforeach
</ol>
