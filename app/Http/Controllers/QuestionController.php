<?php

namespace App\Http\Controllers;

use App\Question;
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

    public function edit(Questionnaire $questionnaire, Question $question){
        return view('Question.edit', compact('question', 'questionnaire'));
    }

    public function update(Questionnaire $questionnaire, Question $question){
        $question->load('answers');
        $data = request()->validate([
           'question.*' => 'required',
           'answers.*.answer' => 'required'
        ]);
        $question->update($data['question']);
        $question->answers[0]->update($data['answers'][0]);
        $question->answers[1]->update($data['answers'][1]);
        $question->answers[2]->update($data['answers'][2]);
        $question->answers[3]->update($data['answers'][3]);

        request()->session()->flash('updateQuestion', 'Update Success!!!');

        return view('questionnaire.show', compact('questionnaire'));
    }



    public function delete(Questionnaire $questionnaire, Question $question){
        $question->answers()->delete();
        $question->delete();
        return redirect()->route('questionnaire.show', $questionnaire->id);
    }
}
