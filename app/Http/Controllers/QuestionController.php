<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire){
        // dd($questionnaire->id);

        return view('Question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire){
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required'
        ]);

        //dd($data['question']);

        $question =  $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect()->route('questionnaire.show', $questionnaire->id);
    }
}
